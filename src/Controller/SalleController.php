<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\TypeParcours;
use App\Entity\Salle;
use App\Entity\Niveaux;

class SalleController extends AbstractController
{
    /**
     * @Route("/salle/{type}", name="salle")
     */
    public function index($type)
    {
        $status = 'rep_sale';
        $em = $this->getDoctrine()->getManager();

        $typeParcoursRepository = $em->getRepository(TypeParcours::class);
        $salleRepository = $em->getRepository(Salle::class);
        $niveauxRepository = $em->getRepository(Niveaux::class);

        $niv = $niveauxRepository->findByType($type);
        
        $salles = $salleRepository->findByParcourOrder($type);
        $parcours = $typeParcoursRepository->find($type);
        return $this->render('salle/index.html.twig', [
            'status' => $status,
            'parcour'=> $parcours,
            'salles' => $salles,
            'niveaux' => $niv
        ]);
    }

    /**
     * @Route("/salle/{niveau}", name="salle_niveau")
     */
    public function sale_niveau($niveau)
    {
        $status = 'rep_sale';
        $em = $this->getDoctrine()->getManager();

        $salleRepository = $em->getRepository(Salle::class);
        $niveauxRepository = $em->getRepository(Niveaux::class);
        
        $salles = $salleRepository->find_salle_niveau($niveau);
        return $this->render('salle/salle.html.twig', [
            'status' => $status,
            'salles' => $salles,
        ]);
    }
}