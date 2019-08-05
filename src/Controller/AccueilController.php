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

class AccueilController extends AbstractController
{
    /**
     * @Route("/", name="accueil" ,options = { "expose" = true })
     */
    public function index(Request $request,EtService $etService)
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
        if($this->getUser()->getEtudiant() != null)
        {   
            $niveaux_et = $this->getUser()->getEtudiant()->getNiveaux();
            $semestres_et = $niveaux_et->getSemestres();

            $matriceEt['0'] = $etService->generateMatriceEt($niveaux_et->getId(), $heures, $jours, $semestres_et['0']->getId());
            $matriceEt['1'] = $etService->generateMatriceEt($niveaux_et->getId(), $heures, $jours, $semestres_et['1']->getId());
        }
        else
        {
            $semestres_et = null;
            $niveaux_et = null;
            $matriceEt = null;
        }
        $last_information = $information_repository->findLastInformation();

        $information_form = $this->createForm(InformationType::class);
        $information_form_view = $information_form->createView();

        $informationChildren_form = $this->createForm(InformationChildrenType::class);
        $informationChildren_form_view = $informationChildren_form->createView();

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
            'last_information' =>$last_information,
            'matriceEt' => $matriceEt,
            'jours' => $jours,
            'heures' => $heures,
            'semestres_et' => $semestres_et
        ]);
    }

    /**
     * @Route("/new-information", name="new-information")
     * 
     */
    public function new_information(Request $request)
    {
        $info = new Information();
        $em = $this->getDoctrine()->getManager();
        $niveaux_repository = $em->getRepository(Niveaux::class);
        $result = $request->request->all();
        $result = $result['information'];
        if ($result['_token']) {
            $em = $this->getDoctrine()->getManager();
            $info->setUser($this->getUser());
            $info->setContenu($result['contenu']);
            $info->setAddAt(new \Datetime());
            foreach($result['niveaux'] as $niv)
            {
                $niv_entity = $niveaux_repository->find($niv);
                $info->addNiveau($niv_entity);
            }
            $em->persist($info);
            $em->flush();
            return $this->redirectToRoute('accueil');
        }
    }

    
    /**
     * @Route("/new-information-children/{id}", name="new-information-children")
     * 
     */
    public function new_information_children(Information $information ,Request $request)
    {
        $info = new InformationChild();
        $em = $this->getDoctrine()->getManager();
        $result = $request->request->all();
        $result = $result['information_children'];
        if ($result['_token']) {
            $em = $this->getDoctrine()->getManager();
            $info->setUser($this->getUser());
            $info->setContenu($result['contenu']);
            $info->setAddAt(new \Datetime());
            $information->addInformationChild($info);
            $em->persist($information);
            $em->persist($info);
            $em->flush();
            return $this->redirectToRoute('accueil');
        }
    }
}
