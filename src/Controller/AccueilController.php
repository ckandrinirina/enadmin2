<?php

namespace App\Controller;

use App\Entity\Semestre;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Etudiant;
use App\Entity\Enseignant;
use App\Entity\TypeParcours;
use App\Entity\EnseignantType;

class AccueilController extends AbstractController
{
    /**
     * @Route("/", name="accueil" ,options = { "expose" = true })
     */
    public function index() 
    {
        $status = "homme";

        $em = $this->getDoctrine()->getManager();
        $etudiantRepository = $em->getRepository(Etudiant::class);
        $enseignantRepository = $em->getRepository(Enseignant::class);
        $typeParcoursRepository = $em->getRepository(TypeParcours::class);
        $enseignantTypeRepository = $em->getRepository(EnseignantType::class);

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
            'enseignant_type'=>$enseignantType
        ]);
    }
}
