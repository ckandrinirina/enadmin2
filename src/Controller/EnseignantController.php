<?php

namespace App\Controller;

use App\Entity\Enseignant;
use App\Entity\EnseignantType;
use App\Form\EnseignantAddType;
use function Sodium\add;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SearchType;
use App\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\AnneUniversitaire;
use App\Service\FileUploader;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use App\Entity\Parametrage;

class EnseignantController extends AbstractController
{
    /**
     * @Route("/enseignant/{type}", name="enseignant")
     */
    public function index($type)
    {
        $status = "listEns";
        $t = $type;

        $em = $this->getDoctrine()->getManager();
        $typeRepository = $em->getRepository(EnseignantType::class);
        $enseignantRepository = $em->getRepository(Enseignant::class);

        $type = $typeRepository->find($type);
        $enseignants = $enseignantRepository->findByType($type);

        return $this->render(
            'enseignant/list.html.twig',
            [
                'enseignants' => $enseignants,
                'status' => $status,
                'type' => $t
            ]
        );
    }

    /**
     * @Route("/enseignant/pdf/{type}", name="enseignant_pdf")
     */
    public function enseignant_pdf($type)
    {
        $status = "listEns";
        $t = $type;

        $em = $this->getDoctrine()->getManager();
        $typeRepository = $em->getRepository(EnseignantType::class);
        $enseignantRepository = $em->getRepository(Enseignant::class);
        $anneUnRep = $em->getRepository(AnneUniversitaire::class);
        $chef_mention_repository = $em->getRepository(Parametrage::class);
        $chef_mention = $chef_mention_repository->find('1');
        $anneU = $anneUnRep->findLatestAu();
        $anne = $anneU['0']->getAnneUniversitaire();
        $type = $typeRepository->find($type);
        $enseignants = $enseignantRepository->findByType($type);

        return $this->render(
            'enseignant/list_pdf.html.twig',
            [
                'enseignants' => $enseignants,
                'status' => $status,
                'annee' => $anne,
                'type' => $t,
                'chef_mention' => $chef_mention
            ]
        );
    }

    /**
     * @Route("enseignant-ajoute/{login}",name="enseignant_add",methods={"GET","POST"})
     */
    public function addEnseignant(Request $request, $login = NULL,FileUploader $fileUploader)
    {
        if ($login == NULL) {
            return $this->redirectToRoute('app_register');
        }
        $status = "listEns";
        $em = $this->getDoctrine()->getManager();
        $userRepository = $em->getRepository(User::class);
        $enseignantRepository = $em->getRepository(Enseignant::class);

        $ens = $enseignantRepository->findByLogin($login);

        if ($ens != NULL) {
            return $this->redirectToRoute('app_register');
        }

        $user = $userRepository->find($login);
        if (!(isset($user))) {
            return $this->redirectToRoute('app_register');
        }

        $enseignant = new Enseignant();
        $form = $this->createForm(EnseignantAddType::class, $enseignant);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $enseignant->setLogin($user);

            $file = $enseignant->getPhoto();
            $path = $fileUploader->upload($file);

            $enseignant->setPhoto($path);
            $em->persist($enseignant);
            $em->flush();

            return $this->redirectToRoute('enseignant',[
                'type'=>$enseignant->getType()->getId()
            ]);
        }

        return $this->render('enseignant/ajoute.html.twig', [
            'form' => $form->createView(),
            'status' => $status
        ]);
    }
    /**
     * @Route("/enseignant-profile/{enseignant}", name="enseignant_profile")
     */
    public function enseignant_profile($enseignant)
    {
        $status = "listEns";
        $em = $this->getDoctrine()->getManager();

        $enseignantRepository = $em->getRepository(Enseignant::class);

        $enseignant = $enseignantRepository->find($enseignant);

        return $this->render('enseignant/profile.html.twig',
            [
                'status' => $status,
                'enseignant'=>$enseignant,
            ]);
    }
    /**
     * @Route("enseignant-edit/{id}/",name="enseignant_edit",methods={"GET","POST"})
     * 
     */
    public function edit(Request $request ,enseignant $enseignant ,FileUploader $fileUploader)
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        if($enseignant == null)
            return $this->redirectToRoute('accueil');
            
        if($enseignant->getLogin()->getId() != $this->getUser()->getId())
            return $this->redirectToRoute('enseignant_profile',['enseignant' => $enseignant->getId()]);

        $em = $this->getDoctrine()->getManager();
        $status = 'listEns';
        $form = $this->createForm(enseignantAddType::class , $enseignant);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $file = $enseignant->getPhoto();
            $path = $fileUploader->upload($file);

            $enseignant->setPhoto($path);

            $em->persist($enseignant);
            $em->flush();

            return $this->redirectToRoute('enseignant_profile',['enseignant' => $enseignant->getId()]);
        }

        return $this->render('enseignant/ajoute.html.twig' , [
            'form' => $form->createView(),
            'status' => $status
        ]);
    }
}
