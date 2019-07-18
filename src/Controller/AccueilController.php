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

class AccueilController extends AbstractController
{
    /**
     * @Route("/", name="accueil" ,options = { "expose" = true })
     */
    public function index(Request $request) 
    {
        $status = "homme";

        $em = $this->getDoctrine()->getManager();
        $etudiantRepository = $em->getRepository(Etudiant::class);
        $enseignantRepository = $em->getRepository(Enseignant::class);
        $typeParcoursRepository = $em->getRepository(TypeParcours::class);
        $enseignantTypeRepository = $em->getRepository(EnseignantType::class);

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

        return $this->render('accueil/index.html.twig',[
            'status' => $status,
            'nbr_etudiant_ac' => $nbr_etudiant_academique,
            'nbr_etudiant_pro' => $nbr_etudiant_professionnel,
            'nbr_enseignant_vac' => $nbr_enseignant_vacataire,
            'nbr_enseignant_per'=>$nbr_enseignant_permanent,
            'allTypeParcours' => $allTypeParcours,
            'enseignant_type'=>$enseignantType,
            'form' => $form->createView(),
        ]);
    }
}
