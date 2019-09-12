<?php

namespace App\Controller;

use App\Entity\Semestre;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Etudiant;
use App\Entity\Enseignant;
use App\Entity\TypeParcours;
use App\Entity\EnseignantType;
use App\Entity\School;
use Symfony\Component\HttpFoundation\Request;
use App\Form\SchoolType;
use App\Form\InformationType;
use App\Entity\Information;
use App\Entity\Niveaux;
use App\Service\EtService;
use App\Entity\Heures;
use App\Entity\Jours;
use App\Form\InformationChildrenType;
use App\Entity\InformationChild;
use App\Service\FileUploader;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class AccueilController extends AbstractController
{
    /**
     * @Route("/accueil", name="accueil" ,options = { "expose" = true })
     * 
     * Vous n'avez pas le permission de voir cette page.
     *
     * @IsGranted("ROLE_USER")
     */
    public function index(Request $request, EtService $etService)
    {
        $status = "homme";

        $em = $this->getDoctrine()->getManager();
        $etudiantRepository = $em->getRepository(Etudiant::class);
        $enseignantRepository = $em->getRepository(Enseignant::class);
        $typeParcoursRepository = $em->getRepository(TypeParcours::class);
        $enseignantTypeRepository = $em->getRepository(EnseignantType::class);
        $information_repository = $em->getRepository(Information::class);
        $heuresRepository = $em->getRepository(Heures::class);
        $joursRepository = $em->getRepository(Jours::class);

        $heures = $heuresRepository->findAll();
        $jours = $joursRepository->findAll();
        if ($this->getUser()->getEtudiant() != null) {
            $niveaux_et = $this->getUser()->getEtudiant()->getNiveaux();
            $semestres_et = $niveaux_et->getSemestres();

            $matriceEt['0'] = $etService->generateMatriceEt($niveaux_et->getId(), $heures, $jours, $semestres_et['0']->getId());
            $matriceEt['1'] = $etService->generateMatriceEt($niveaux_et->getId(), $heures, $jours, $semestres_et['1']->getId());
        } else {
            $semestres_et = null;
            $niveaux_et = null;
            $matriceEt = null;
        }
        if ($this->getUser()->getEtudiant() == null)
            $last_information = $information_repository->findLastInformation();
        else
            $last_information = $information_repository->findLastInformationByNiveaux($this->getUser()->getEtudiant()->getNiveaux()->getId());

        $information_form = $this->createForm(InformationType::class);
        $information_form_view = $information_form->createView();

        if ($last_information != null) {
            foreach ($last_information as $l) {
                $form_child[$l->getId()] = $this->createForm(InformationChildrenType::class);
                $informationChildren_form_view[$l->getId()] = $form_child[$l->getId()]->createView();
            }
        } else {
            $informationChildren_form_view = null;
        }

        // $informationChildren_form = $this->createForm(InformationChildrenType::class);
        // $informationChildren_form_view = $informationChildren_form->createView();

        $school = new School();
        $form = $this->createForm(SchoolType::class, $school);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($school);
            $entityManager->flush();
            return $this->redirectToRoute('accueil');
        }

        $nbr_etudiant_academique = $etudiantRepository->count_academique();
        $nbr_etudiant_professionnel = $etudiantRepository->count_professionnel();
        $nbr_enseignant_vacataire = $enseignantRepository->count_vacataire();
        $nbr_enseignant_permanent = $enseignantRepository->count_permanent();

        $enseignantType = $enseignantTypeRepository->findAll();
        $allTypeParcours = $typeParcoursRepository->findAll();

        return $this->render('accueil/index.html.twig', [
            'status' => $status,
            'nbr_etudiant_ac' => $nbr_etudiant_academique,
            'nbr_etudiant_pro' => $nbr_etudiant_professionnel,
            'nbr_enseignant_vac' => $nbr_enseignant_vacataire,
            'nbr_enseignant_per' => $nbr_enseignant_permanent,
            'allTypeParcours' => $allTypeParcours,
            'enseignant_type' => $enseignantType,
            'form' => $form->createView(),
            'information_form_view' => $information_form_view,
            'informationChildren_form_view' => $informationChildren_form_view,
            'last_information' => $last_information,
            'matriceEt' => $matriceEt,
            'jours' => $jours,
            'heures' => $heures,
            'semestres_et' => $semestres_et
        ]);
    }

    /**
     * @Route("/new-information/{route}", name="new-information")
     * Vous n'avez pas le permission de voir cette page.
     *
     * @IsGranted("ROLE_USER")
     */
    public function new_information(Request $request, $route = 0,FileUploader $fileUploader)
    {
        $info = new Information();
        $em = $this->getDoctrine()->getManager();
        $niveaux_repository = $em->getRepository(Niveaux::class);
        $files = $request->files->all();
        $result = $request->request->all();
        $result = $result['information'];
        $files = $files['information'];
        if ($result['_token']) {
            $em = $this->getDoctrine()->getManager();

            if($files['file'] != null)
            {
                $path = $fileUploader->upload($files['file']);
            }
            else
                $path = null;

            $info->setFile($path);

            $info->setUser($this->getUser());
            $info->setContenu($result['contenu']);
            $info->setAddAt(new \Datetime());
            if (!isset($result['niveaux'])) {
                $niv_entity = $niveaux_repository->findAll();
                foreach ($niv_entity as $niv_l)
                    $info->addNiveau($niv_l);
            } else {
                foreach ($result['niveaux'] as $niv) {
                    $niv_entity = $niveaux_repository->find($niv);
                    $info->addNiveau($niv_entity);
                }
            }
            $em->persist($info);
            $em->flush();
            if ($route == 0)
                return $this->redirectToRoute('accueil');
            else
                return $this->redirectToRoute('list_all_info',['pagination' => '0']);
        }
    }


    /**
     * @Route("/new-information-children/{id}/{route}/{pagination}", name="new-information-children")
     * Vous n'avez pas le permission de voir cette page.
     *
     * @IsGranted("ROLE_USER")
     */
    public function new_information_children(Information $information, Request $request, $route = 0,$pagination,FileUploader $fileUploader)
    {
        $info = new InformationChild();
        $em = $this->getDoctrine()->getManager();
        $files = $request->files->all();
        $result = $request->request->all();
        $result = $result['information_children'];
        $files = $files['information_children'];
        if ($result['_token']) {
            $em = $this->getDoctrine()->getManager();

            if($files['file'] != null)
            {
                $path = $fileUploader->upload($files['file']);
            }
            else
                $path = null;

            $info->setFile($path);

            $info->setUser($this->getUser());
            $info->setContenu($result['contenu']);
            $info->setAddAt(new \Datetime());
            $information->addInformationChild($info);
            $em->persist($information);
            $em->persist($info);
            $em->flush();
            if ($route == 0)
                return $this->redirectToRoute('accueil');
            else
                return $this->redirectToRoute('list_all_info',[
                    'pagination' => $pagination
                ]);
        }
    }
}
