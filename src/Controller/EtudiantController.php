<?php

namespace App\Controller;

use App\Entity\Etudiant;
use App\Entity\Niveaux;
use App\Entity\TypeParcours;
use App\Entity\User;
use App\Form\EtudiantType;
use App\Form\EtudiantEditType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Service\FileUploader;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use App\Entity\Parametrage;

class EtudiantController extends AbstractController
{
    /**
     * @Route("/etudiant/{type}/{niveaux}", name="list")
     * Vous n'avez pas le permission de voir cette page.
     *
     * @IsGranted("ROLE_USER")
     */
    public function List($type, $niveaux)
    {
        $status = "listE";
        $em = $this->getDoctrine()->getManager();

        $typeParcoursRepository = $em->getRepository(TypeParcours::class);
        $niveauxRepository = $em->getRepository(Niveaux::class);
        $etudiantRepository = $em->getRepository(Etudiant::class);

        $parcours = $typeParcoursRepository->find($type);
        $niv = $niveauxRepository->findByType($type);
        $etudiants = $etudiantRepository->findByNiveauxOrderByName($niveaux);

        return $this->render(
            'etudiant/list.html.twig',
            [
                'parcour' => $parcours,
                'niveaux' => $niv,
                'status' => $status,
                'n' => $niveaux,
                'etudiants' => $etudiants,
            ]
        );
    }

    /**
     * @Route("etudiant-ajoute/{login}",name="etudiant_add",methods={"GET","POST"})
     */
    public function ajoute(Request $request, $login = NULL, FileUploader $fileUploader)
    {
        if ($login == NULL) {
            return $this->redirectToRoute('app_register');
        }

        $status = "addE";

        $em = $this->getDoctrine()->getManager();

        $userRepository = $em->getRepository(User::class);
        $etudiantRepository = $em->getRepository(Etudiant::class);

        $et = $etudiantRepository->findByLogin($login);
        $user = $userRepository->find($login);

        if ($et != NULL) {
            return $this->redirectToRoute('app_register');
        }
        if (!(isset($user))) {
            return $this->redirectToRoute('app_register');
        }

        $etudiant = new Etudiant();
        $form = $this->createForm(EtudiantType::class, $etudiant);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $etudiant->setLogin($user);

            $file = $etudiant->getPhoto();
            $path = $fileUploader->upload($file);

            $etudiant->setPhoto($path);

            $em->persist($etudiant);
            $em->flush();

            return $this->redirectToRoute('list', ['type' => $etudiant->getParcour()->getId(), 'niveaux' => $etudiant->getNiveaux()->getId()]);
        }

        return $this->render('etudiant/ajoute.html.twig', [
            'form' => $form->createView(),
            'status' => $status
        ]);
    }

    /**
     * @Route("/etudiant/pdf/{type}/{niveaux}", name="list_pdf")
     * Vous n'avez pas le permission de voir cette page.
     *
     * @IsGranted("ROLE_USER")
     */
    public function list_pdf($type, $niveaux) 
    {
        $status = "listE";
        $em = $this->getDoctrine()->getManager();

        $typeParcoursRepository = $em->getRepository(TypeParcours::class);
        $niveauxRepository = $em->getRepository(Niveaux::class);
        $etudiantRepository = $em->getRepository(Etudiant::class);

        $parcours = $typeParcoursRepository->find($type);
        $niv_name = $niveauxRepository->find($niveaux);
        $niv = $niveauxRepository->findByType($type);
        $etudiants = $etudiantRepository->findByNiveauxOrderByName($niveaux);

        $chef_mention_repository = $em->getRepository(Parametrage::class);
        $chef_mention = $chef_mention_repository->find('1');

        return $this->render(
            'etudiant/list_pdf.html.twig',
            [
                'parcour' => $parcours,
                'niveaux' => $niv,
                'status' => $status,
                'n' => $niveaux,
                'etudiants' => $etudiants,
                'niv_name' => $niv_name,
                'type' => $type,
                'chef_mention' => $chef_mention
            ]
        );
    }

    /**
     * @Route("/etudiant-profile/{etudiant}", name="etudiant_profile")
     * Vous n'avez pas le permission de voir cette page.
     *
     * @IsGranted("ROLE_USER")
     */
    public function etudiant_profile($etudiant)
    {
        $status = "listE";
        $em = $this->getDoctrine()->getManager();

        $etudiantRepository = $em->getRepository(Etudiant::class);

        $etudiant = $etudiantRepository->find($etudiant);

        return $this->render(
            'etudiant/profile.html.twig',
            [
                'status' => $status,
                'etudiant' => $etudiant,
            ]
        );
    }

    /**
     * @Route("etudiant-edit/{id}/",name="etudiant_edit",methods={"GET","POST"})
     * Vous n'avez pas le permission de voir cette page.
     *
     * @IsGranted("ROLE_USER")     
     */
    public function edit(Request $request, Etudiant $etudiant, FileUploader $fileUploader)
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        if($this->getUser()->getEtudiant() != null)
        {
            if($this->getUser()->getEtudiant()->getId() != $etudiant->getId())
                return $this->redirectToRoute('accueil');
        }

        if ($etudiant == null)
            return $this->redirectToRoute('accueil');

        if ($etudiant->getLogin()->getId() != $this->getUser()->getId())
            return $this->redirectToRoute('etudiant_profile', ['etudiant' => $etudiant->getId()]);

        $em = $this->getDoctrine()->getManager();
        $status = 'addE';
        $form = $this->createForm(EtudiantEditType::class, $etudiant);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $file = $etudiant->getPhoto();
            $path = $fileUploader->upload($file);

            $etudiant->setPhoto($path);

            $em->persist($etudiant);
            $em->flush();

            return $this->redirectToRoute('etudiant_profile', ['etudiant' => $etudiant->getId()]);
        }

        return $this->render('etudiant/edit.html.twig', [
            'form' => $form->createView(),
            'status' => $status
        ]);
    }

    /**
     * @Route("etudiant-archive",name="liste_archive")
     * Vous n'avez pas le permission de voir cette page.
     *
     * @IsGranted("ROLE_USER")     
     */
    public function archive()
    {
        $status = 'archive';
        $em = $this->getDoctrine()->getManager();
        $niveauxRepository = $em->getRepository(Niveaux::class);
        $etudiant_repository = $em->getRepository(Etudiant::class);
        $archives = $etudiant_repository->findAll();
        return $this->render('etudiant/archive.html.twig', [
            'status' => $status,
            'archives'=> $archives
        ]);
    }
}
