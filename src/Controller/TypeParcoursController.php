<?php

namespace App\Controller;

use App\Entity\AnneUniversitaire;
use App\Entity\TypeParcours;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\EnseignantType;

class TypeParcoursController extends AbstractController
{
    /**
     * @Route("/type/parcours", name="type_parcours")
     */
    public function listAll()
    {
        $em = $this->getDoctrine()->getManager();
        $typeParcoursRepository = $em->getRepository(TypeParcours::class);

        $allTypeParcours = $typeParcoursRepository->findAll();

        return $this->render('type_parcours/listAll.html.twig',['allTypeParcours' => $allTypeParcours]);
    }

    /**
     * @Route("/type/repartition", name="repartition")
     */
    public function repartition()
    {
        $em = $this->getDoctrine()->getManager();
        $typeParcoursRepository = $em->getRepository(TypeParcours::class);

        $allTypeParcours = $typeParcoursRepository->findAll();

        return $this->render('type_parcours/repartition.html.twig',['allTypeParcours' => $allTypeParcours]);
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

        return $this->render('type_parcours/notelist.html.twig',['allTypeParcours' => $allTypeParcours,'au'=>$lastAu]);
    }

    /**
     * @Route("/type/noteAjoute", name="noteAjoute")
     */
    public function noteAjoute()
    {
        $em = $this->getDoctrine()->getManager();
        $typeParcoursRepository = $em->getRepository(TypeParcours::class);
        $auRepository = $em->getRepository(AnneUniversitaire::class);

        $lastAu = $auRepository->findLatestAu();
        $allTypeParcours = $typeParcoursRepository->findAll();

        return $this->render('type_parcours/noteAjoute.html.twig',['allTypeParcours' => $allTypeParcours,'au'=>$lastAu]);
    }

    /**
     * @Route("/type/emploiDuTemps", name="emploiDuTemps")
     */
    public function emploiDuTemps()
    {
        $em = $this->getDoctrine()->getManager();
        $typeParcoursRepository = $em->getRepository(TypeParcours::class);

        $allTypeParcours = $typeParcoursRepository->findAll();

        return $this->render('type_parcours/emploiDuTemps.html.twig',['allTypeParcours' => $allTypeParcours]);
    }
    /**
     * @Route("/type/emploiDuTemps/edit", name="emploiDuTempsEdit")
     */
    public function emploiDuTempsEdit()
    {
        $em = $this->getDoctrine()->getManager();
        $typeParcoursRepository = $em->getRepository(TypeParcours::class);

        $allTypeParcours = $typeParcoursRepository->findAll();

        return $this->render('type_parcours/emploiDuTempsEdit.html.twig',['allTypeParcours' => $allTypeParcours]);
    }

    /**
     * @Route("/repartition/uc/by/niveau", name="repartition_uc_by_niveau_left")
     */
    public function repartition_uc_by_niveau()
    {
        $em = $this->getDoctrine()->getManager();
        $typeParcoursRepository = $em->getRepository(TypeParcours::class);

        $allTypeParcours = $typeParcoursRepository->findAll();

        return $this->render('type_parcours/repartition_uc_by_niveau.html.twig',['allTypeParcours' => $allTypeParcours]);
    }

    /**
     * @Route("enseignant/type" ,name="enseignant_type")
     */
    public function enseignant_type()
    {
        $em = $this->getDoctrine()->getManager();
        $enseignantTypeRepository = $em->getRepository(EnseignantType::class);
        $enseignantType = $enseignantTypeRepository->findAll();

        return $this->render('type_parcours/enseignant_type.html.twig',
        ['enseignant_type'=>$enseignantType]
    );
    }

    /**
     * @Route("/type/noteresult", name="noteresult")
     */
    public function noteResult()
    {
        $em = $this->getDoctrine()->getManager();
        $typeParcoursRepository = $em->getRepository(TypeParcours::class);
        $auRepository = $em->getRepository(AnneUniversitaire::class);

        $lastAu = $auRepository->findLatestAu();
        $allTypeParcours = $typeParcoursRepository->findAll();

        return $this->render('type_parcours/noteResult.html.twig',['allTypeParcours' => $allTypeParcours,'au'=>$lastAu]);
    }
}
