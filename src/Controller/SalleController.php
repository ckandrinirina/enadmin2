<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\TypeParcours;
use App\Entity\Salle;
use App\Entity\Niveaux;
use App\Form\SalleType;
use Symfony\Component\HttpFoundation\Request;
use Proxies\__CG__\App\Entity\SalleClass;

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
            'parcour' => $parcours,
            'salles' => $salles,
            'niveaux' => $niv
        ]);
    }

    /**
     * @Route("/salle-list/{niveau}", name="salle_niveau")
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

    /**
     * @Route("/salle-edit/{type}", name="salle_edit")
     */
    public function index_2($type)
    {
        $status = 'rep_sale';
        $em = $this->getDoctrine()->getManager();

        $typeParcoursRepository = $em->getRepository(TypeParcours::class);
        $salleRepository = $em->getRepository(Salle::class);
        $niveauxRepository = $em->getRepository(Niveaux::class);

        $niv = $niveauxRepository->findByType($type);

        $salles = $salleRepository->findByParcourOrder($type);
        $parcours = $typeParcoursRepository->find($type);
        return $this->render('salle/index_2.html.twig', [
            'status' => $status,
            'parcour' => $parcours,
            'salles' => $salles,
            'niveaux' => $niv
        ]);
    }

    /**
     * @Route("/salle-list-edit/{niveau}", name="salle_niveau_edit")
     */
    public function sale_niveau_2($niveau)
    {
        $status = 'rep_sale_edit';
        $em = $this->getDoctrine()->getManager();

        $salleRepository = $em->getRepository(Salle::class);

        $salles = $salleRepository->find_salle_niveau($niveau);
        if($salles != null)
        {
            foreach ($salles as $s) {
                $form[$s->getId()] = $this->createForm(SalleType::class);
                $view_form[$s->getId()] = $form[$s->getId()]->createView();
            }
        }
        else
        {
            $view_form = null;
        }
        return $this->render('salle/salle_2.html.twig', [
            'status' => $status,
            'salles' => $salles,
            'view_form' => $view_form
        ]);
    }

    /**
     * @Route("/change-salle/{id}", name="change_salle")
     * 
     */
    public function change_salle(Salle $salle, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $result = $request->request->all();
        $result = $result['salle'];
        $salle_class_repository = $em->getRepository(SalleClass::class);
        if ($result['_token']) {
            $salle_class = $salle_class_repository->find($result['salleClass']);
            $salle->setSalleClass($salle_class);
            $em->persist($salle);
            $em->flush();
            return $this->redirectToRoute('salle_edit',['type'=>$salle->getParcour()->getId()]);
        }
    }
}
