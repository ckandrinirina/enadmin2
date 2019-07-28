<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Etudiant;
use App\Entity\Niveaux;
use App\Entity\Scolarite;
use App\Form\ScolariteType;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use App\Entity\ScolariteImage;
use App\Form\ScolariteImageType;
use App\Service\FileUploader;

class ScolariteController extends AbstractController
{
    /**
     * @Route("/scolarite/{id}", name="scolarite")
     */
    public function index(Etudiant $etudiant, Request $request,FileUploader $fileUploader)
    {
        /* avadika service am manaraka */
        $role = $this->getUser()->getRoles();
        $flag = 1;

        $id_etudiant = $etudiant->getId();

        foreach ($role as $r)
            if ($r == 'ROLE_ADMIN' || $r == 'ROLE_SUPER_ADMIN')
                $flag = 0;

        if ($this->getUser()->getEtudiant() != null)
            if ($id_etudiant == $this->getUser()->getEtudiant()->getId())
                $flag = 0;

        if ($flag == 1)
            return $this->redirectToRoute('accueil');
        /* avadika service am manaraka */

        $status = 'etList';
        $em = $this->getDoctrine()->getManager();

        $niveaux_repository = $em->getRepository(Niveaux::class);
        $scolarite_repository = $em->getRepository(Scolarite::class);

        $scolarite_form = new Scolarite();

        $niv = $niveaux_repository->findByType($etudiant->getParcour()->getId());

        $option['data'] = $niv;

        $form = $this->createForm(ScolariteType::class, $scolarite_form, $option);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            $scolarite_test = $scolarite_repository->find_if_exist($etudiant->getId(), $data['niveau']->getId());
            if ($scolarite_test != null) {
                $this->addFlash(
                    'erreur',
                    'Le champ existe déja'
                );
                return $this->redirectToRoute('scolarite', ['id' => $etudiant->getId()]);
            }

            $scolarite_form->setEtudiant($etudiant);
            $scolarite_form->setNiveau($data['niveau']);
            $scolarite_form->setDateInscription($data['dateInscription']);
            $scolarite_form->setNumeroInscription($data['numeroInscription']);
            $em->persist($scolarite_form);
            $em->flush();
            $this->addFlash(
                'succes',
                'Référence insérer'
            );
            return $this->redirectToRoute('scolarite', ['id' => $etudiant->getId()]);
        }

        $scolarite_image = new ScolariteImage();
        $form2 = $this->createForm(ScolariteImageType::class, $scolarite_image);
        $form2->handleRequest($request);
        if ($form2->isSubmitted() && $form2->isValid()) {

            $file = $scolarite_image->getUrl();
            $path = $fileUploader->upload($file);

            $scolarite_image->setUrl($path);

            $em->persist($scolarite_image);

            $em->flush();
            $this->addFlash(
                'succes',
                'Image inserer'
            );
        }

        $scolarite = $scolarite_repository->findByEtudiant($etudiant);

        $scolarite_actuel = $scolarite_repository->get_actual_scolarite($etudiant);
        $scolarite_actuel = $scolarite_actuel['0'];

        return $this->render('scolarite/index.html.twig', [
            'status' => $status,
            'niveaux' => $niv,
            'etudiant' => $etudiant,
            'scolarite' => $scolarite,
            'scolarite_actuel' => $scolarite_actuel,
            'form' => $form->createView(),
            'form2' => $form2->createView()
        ]);
    }

    // /**
    //  * @Route("/scolarite-add/{id}", name="scolarite_add")
    //  */
    // public function add_file(Request $request, Etudiant $etudiant)
    // {
    //     if ($etudiant->getId() != $this->getUser()->getEtudiant()->getId())
    //         return $this->redirectToRoute('accueil');
    //     $status = 'ok';

    //     $scolarite = new Scolarite();
    //     $form = $this->createForm(ScolariteType::class, $scolarite);
    //     $form->handleRequest($request);
    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $scolarite->setEtudiant($etudiant);
    //         dump($scolarite);
    //     }
    //     return $this->render('scolarite/add_scolarite.html.twig', [
    //         'status' => $status,
    //         'form' => $form->createView()
    //     ]);
    // }

    /**
     * @Route("/scolarite-view/{id}", name="scolarite_view")
     */
    public function scolarite_niveau(Niveaux $niveau)
    {
        $em = $this->getDoctrine()->getManager();
        $scolarite_repository = $em->getRepository(Scolarite::class);
        $scolarite_image_repository = $em->getRepository(ScolariteImage::class);

        $scolarite = $scolarite_repository->findByNiveau($niveau);
        $scolarite_image = $scolarite_image_repository->findByScolarites($scolarite);

        if($scolarite_image != null)
            $i = $scolarite_image['0']->getId();
        else
            $i = '';

        return $this->render('scolarite/view_scolarite.html.twig', [
            'scolarite' => $scolarite,
            'scolarite_image' => $scolarite_image,
            'i' => $i
        ]);
    }
}
