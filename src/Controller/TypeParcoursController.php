<?php

namespace App\Controller;

use App\Entity\AnneUniversitaire;
use App\Entity\TypeParcours;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\EnseignantType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class TypeParcoursController extends AbstractController
{
    /**
     * @Route("/type/parcours", name="type_parcours")
     * Vous n'avez pas le permission de voir cette page.
     *
     * @IsGranted("ROLE_USER")
     */
    public function listAll()
    {
        $em = $this->getDoctrine()->getManager();
        $typeParcoursRepository = $em->getRepository(TypeParcours::class);

        $allTypeParcours = $typeParcoursRepository->findAll();
        unset($allTypeParcours['2']);

        return $this->render('type_parcours/listAll.html.twig', ['allTypeParcours' => $allTypeParcours]);
    }

    /**
     * @Route("/type/repartition", name="repartition")
     * Vous n'avez pas le permission de voir cette page.
     *
     * @IsGranted("ROLE_USER")
     */
    public function repartition()
    {
        $em = $this->getDoctrine()->getManager();
        $typeParcoursRepository = $em->getRepository(TypeParcours::class);

        $allTypeParcours = $typeParcoursRepository->findAll();
        unset($allTypeParcours['2']);

        return $this->render('type_parcours/repartition.html.twig', ['allTypeParcours' => $allTypeParcours]);
    }

    /**
     * @Route("/type/notelist", name="notelist")
     */
    public function noteList()
    {
        $em = $this->getDoctrine()->getManager();
        $typeParcoursRepository = $em->getRepository(TypeParcours::class);
        $auRepository = $em->getRepository(AnneUniversitaire::class);

        $lastAu = $auRepository->findLatestAu();
        $allTypeParcours = $typeParcoursRepository->findAll();
        unset($allTypeParcours['2']);

        return $this->render('type_parcours/notelist.html.twig', ['allTypeParcours' => $allTypeParcours, 'au' => $lastAu]);
    }

    /**
     * @Route("/type/noteAjoute", name="noteAjoute")
     * Vous n'avez pas le permission de voir cette page.
     *
     * @IsGranted("ROLE_USER")
     */
    public function noteAjoute()
    {
        $em = $this->getDoctrine()->getManager();
        $typeParcoursRepository = $em->getRepository(TypeParcours::class);
        $auRepository = $em->getRepository(AnneUniversitaire::class);

        $lastAu = $auRepository->findLatestAu();
        $allTypeParcours = $typeParcoursRepository->findAll();
        unset($allTypeParcours['2']);

        return $this->render('type_parcours/noteAjoute.html.twig', ['allTypeParcours' => $allTypeParcours, 'au' => $lastAu]);
    }

    /**
     * @Route("/type/emploiDuTemps", name="emploiDuTemps")
     */
    public function emploiDuTemps()
    {
        $em = $this->getDoctrine()->getManager();
        $typeParcoursRepository = $em->getRepository(TypeParcours::class);

        $allTypeParcours = $typeParcoursRepository->findAll();
        unset($allTypeParcours['2']);

        return $this->render('type_parcours/emploiDuTemps.html.twig', ['allTypeParcours' => $allTypeParcours]);
    }
    /**
     * @Route("/type/emploiDuTemps/edit", name="emploiDuTempsEdit")
     * Vous n'avez pas le permission de voir cette page.
     *
     * @IsGranted("ROLE_USER")
     */
    public function emploiDuTempsEdit()
    {
        $em = $this->getDoctrine()->getManager();
        $typeParcoursRepository = $em->getRepository(TypeParcours::class);

        $allTypeParcours = $typeParcoursRepository->findAll();
        unset($allTypeParcours['2']);

        return $this->render('type_parcours/emploiDuTempsEdit.html.twig', ['allTypeParcours' => $allTypeParcours]);
    }

    /**
     * @Route("/repartition/uc/by/niveau", name="repartition_uc_by_niveau_left")
     * Vous n'avez pas le permission de voir cette page.
     *
     * @IsGranted("ROLE_USER")
     */
    public function repartition_uc_by_niveau()
    {
        $em = $this->getDoctrine()->getManager();
        $typeParcoursRepository = $em->getRepository(TypeParcours::class);

        $allTypeParcours = $typeParcoursRepository->findAll();
        unset($allTypeParcours['2']);

        return $this->render('type_parcours/repartition_uc_by_niveau.html.twig', ['allTypeParcours' => $allTypeParcours]);
    }

    /**
     * @Route("/repartition/uc/by/niveau", name="repartition_uc_by_niveau_left_edit")
     * Vous n'avez pas le permission de voir cette page.
     *
     * @IsGranted("ROLE_USER")
     */
    public function repartition_uc_by_niveau_edit()
    {
        $em = $this->getDoctrine()->getManager();
        $typeParcoursRepository = $em->getRepository(TypeParcours::class);

        $allTypeParcours = $typeParcoursRepository->findAll();
        unset($allTypeParcours['2']);

        return $this->render('type_parcours/repartition_uc_by_niveau_edit.html.twig', ['allTypeParcours' => $allTypeParcours]);
    }

    /**
     * @Route("enseignant/type" ,name="enseignant_type")
     * Vous n'avez pas le permission de voir cette page.
     *
     * @IsGranted("ROLE_USER")
     */
    public function enseignant_type()
    {
        $em = $this->getDoctrine()->getManager();
        $enseignantTypeRepository = $em->getRepository(EnseignantType::class);
        $enseignantType = $enseignantTypeRepository->findAll();

        return $this->render(
            'type_parcours/enseignant_type.html.twig',
            ['enseignant_type' => $enseignantType]
        );
    }

    /**
     * @Route("/type/noteresult", name="noteresult")
     * Vous n'avez pas le permission de voir cette page.
     *
     * @IsGranted("ROLE_USER")
     */
    public function noteResult()
    {
        $em = $this->getDoctrine()->getManager();
        $typeParcoursRepository = $em->getRepository(TypeParcours::class);
        $auRepository = $em->getRepository(AnneUniversitaire::class);

        $lastAu = $auRepository->findLatestAu();
        $allTypeParcours = $typeParcoursRepository->findAll();
        unset($allTypeParcours['2']);

        return $this->render('type_parcours/noteResult.html.twig', ['allTypeParcours' => $allTypeParcours, 'au' => $lastAu]);
    }

    /**
     * @Route("/repartition/salle/by/niveau", name="repartition_salle")
     * Vous n'avez pas le permission de voir cette page.
     *
     * @IsGranted("ROLE_USER")
     */
    public function repartition_salle()
    {
        $em = $this->getDoctrine()->getManager();
        $typeParcoursRepository = $em->getRepository(TypeParcours::class);

        $allTypeParcours = $typeParcoursRepository->findAll();
        unset($allTypeParcours['2']);

        return $this->render('type_parcours/repartition_salle.html.twig', ['allTypeParcours' => $allTypeParcours]);
    }

    /**
     * @Route("/repartition/salle_2/by/niveau", name="_2")
     * Vous n'avez pas le permission de voir cette page.
     *
     * @IsGranted("ROLE_USER")
     */
    public function repartition_salle_2()
    {
        $em = $this->getDoctrine()->getManager();
        $typeParcoursRepository = $em->getRepository(TypeParcours::class);

        $allTypeParcours = $typeParcoursRepository->findAll();
        unset($allTypeParcours['2']);

        return $this->render('type_parcours/repartition_salle_2.html.twig', ['allTypeParcours' => $allTypeParcours]);
    }

    /**
     * @Route("/type/parcours", name="deliberation")
     * Vous n'avez pas le permission de voir cette page.
     *
     * @IsGranted("ROLE_USER")
     */
    public function deliberation()
    {
        $em = $this->getDoctrine()->getManager();
        $typeParcoursRepository = $em->getRepository(TypeParcours::class);

        $allTypeParcours = $typeParcoursRepository->findAll();
        unset($allTypeParcours['2']);

        return $this->render('type_parcours/deliberation.html.twig', ['allTypeParcours' => $allTypeParcours]);
    }
}
