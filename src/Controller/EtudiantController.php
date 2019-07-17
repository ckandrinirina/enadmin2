<?php

namespace App\Controller;

use App\Entity\Etudiant;
use App\Entity\Niveaux;
use App\Entity\TypeParcours;
use App\Entity\User;
use App\Form\EtudiantType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Service\FileUploader;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class EtudiantController extends AbstractController
{
    /**
     * @Route("/etudiant/{type}/{niveaux}", name="list")
     */
    public function List($type ,$niveaux)
    {
        $status = "listE";
        $em = $this->getDoctrine()->getManager();

        $typeParcoursRepository = $em->getRepository(TypeParcours::class);
        $niveauxRepository = $em->getRepository(Niveaux::class);
        $etudiantRepository = $em->getRepository(Etudiant::class);

        $parcours = $typeParcoursRepository->find($type);
        $niv = $niveauxRepository->findByType($type);
        $etudiants = $etudiantRepository->findByNiveaux($niveaux);

        return $this->render('etudiant/list.html.twig',
            [
                'parcour'=> $parcours,
                'niveaux' => $niv,
                'status' => $status,
                'n'=>$niveaux,
                'etudiants'=>$etudiants
            ]);
    }

    /**
     * @Route("etudiant-ajoute/{login}",name="etudiant_add",methods={"GET","POST"})
     * 
     */
    public function ajoute(Request $request ,$login = NULL ,FileUploader $fileUploader)
    {
        if($login == NULL)
        {
            return $this->redirectToRoute('app_register');
        }

        $status = "addE";

        $em = $this->getDoctrine()->getManager();

        $userRepository = $em->getRepository(User::class);
        $etudiantRepository = $em->getRepository(Etudiant::class);

        $et = $etudiantRepository->findByLogin($login);
        $user = $userRepository->find($login);

        if($et != NULL)
        {
            return $this->redirectToRoute('app_register');
        }
        if(!(isset($user)))
        {
            return $this->redirectToRoute('app_register');
        }

        $etudiant = new Etudiant();
        $form = $this->createForm(EtudiantType::class , $etudiant);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $etudiant->setLogin($user);

            $file = $etudiant->getPhoto();
            $path = $fileUploader->upload($file);

            $etudiant->setPhoto($path);

            $em->persist($etudiant);
            $em->flush();

            return $this->redirectToRoute('list',['type' => $etudiant->getParcour()->getId(),'niveaux'=>$etudiant->getNiveaux()->getId()]);
        }

        return $this->render('etudiant/ajoute.html.twig' , [
            'form' => $form->createView(),
            'status' => $status
        ]);
    }

    /**
     * @Route("/etudiant/pdf/{type}/{niveaux}", name="list_pdf")
     */
    public function list_pdf($type ,$niveaux)
    {
        $status = "listE";
        $em = $this->getDoctrine()->getManager();

        $typeParcoursRepository = $em->getRepository(TypeParcours::class);
        $niveauxRepository = $em->getRepository(Niveaux::class);
        $etudiantRepository = $em->getRepository(Etudiant::class);

        $parcours = $typeParcoursRepository->find($type);
        $niv_name = $niveauxRepository->find($niveaux);
        $niv = $niveauxRepository->findByType($type);
        $etudiants = $etudiantRepository->findByNiveaux($niveaux);

        return $this->render('etudiant/list_pdf.html.twig',
            [
                'parcour'=> $parcours,
                'niveaux' => $niv,
                'status' => $status,
                'n' => $niveaux,
                'etudiants'=>$etudiants,
                'niv_name' => $niv_name,
                'type' => $type
            ]);
    }

    /**
     * @Route("/etudiant-profile/{etudiant}", name="etudiant_profile")
     */
    public function etudiant_profile($etudiant)
    {
        $status = "listE";
        $em = $this->getDoctrine()->getManager();

        $etudiantRepository = $em->getRepository(Etudiant::class);

        $etudiant = $etudiantRepository->find($etudiant);

        return $this->render('etudiant/profile.html.twig',
            [
                'status' => $status,
                'etudiant'=>$etudiant,
            ]);
    }

    /**
     * @Route("etudiant-edit/{id}/",name="etudiant_edit",methods={"GET","POST"})
     * 
     */
    public function edit(Request $request ,Etudiant $etudiant ,FileUploader $fileUploader)
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        if($etudiant == null)
            return $this->redirectToRoute('accueil');
            
        if($etudiant->getLogin()->getId() != $this->getUser()->getId())
            return $this->redirectToRoute('etudiant_profile',['etudiant' => $etudiant->getId()]);

        $em = $this->getDoctrine()->getManager();
        $status = 'addE';
        $form = $this->createForm(EtudiantType::class , $etudiant);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $file = $etudiant->getPhoto();
            $path = $fileUploader->upload($file);

            $etudiant->setPhoto($path);

            $em->persist($etudiant);
            $em->flush();

            return $this->redirectToRoute('etudiant_profile',['etudiant' => $etudiant->getId()]);
        }

        return $this->render('etudiant/ajoute.html.twig' , [
            'form' => $form->createView(),
            'status' => $status
        ]);
    }
}
