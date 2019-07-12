<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\TypeParcours;
use App\Entity\Niveaux;
use App\Entity\Heures;
use App\Entity\Jours;
use App\Service\EtService;
use Symfony\Component\HttpFoundation\Request;
use App\Form\EcChoiceType;
use App\Entity\EmploiDuTemps;
use App\Entity\EC;
use App\Entity\RepartitionEC;

class EmploiDuTempsController extends AbstractController
{
    /**
     * @Route("/emploi/du/temps/{type}/{niveaux}", name="etemps")
     */
    public function index(EtService $etService,$type, $niveaux)
    {
        $status = 'etemps';
        $em = $this->getDoctrine()->getManager();
        $typeParcoursRepository = $em->getRepository(TypeParcours::class);
        $niveauxRepository = $em->getRepository(Niveaux::class);
        $heuresRepository = $em->getRepository(Heures::class);
        $joursRepository = $em->getRepository(Jours::class);

        $heures = $heuresRepository->findAll();
        $jours = $joursRepository->findAll();

        $parcours = $typeParcoursRepository->find($type);
        $niv = $niveauxRepository->findByType($type);
        $matriceEt = $etService->generateMatriceEt($niveaux,$heures,$jours);

        return $this->render('emploi_du_temps/index.html.twig',
        [
            'parcour' => $parcours,
            'niveaux' => $niv,
            'status'=>$status,
            'n' => $niveaux,
            'jours' => $jours,
            'heures' => $heures,
            'matriceEt'=> $matriceEt,
        ]
    );
    }
    /**
     * @Route("/emploi/du/temps/add/{type}/{niveaux}", name="add_etemps",options = { "expose" = true })
     */
    public function add($type, $niveaux,EtService $etService)
    {
        $status = 'etemps';
        $em = $this->getDoctrine()->getManager();
        $typeParcoursRepository = $em->getRepository(TypeParcours::class);
        $niveauxRepository = $em->getRepository(Niveaux::class);
        $heuresRepository = $em->getRepository(Heures::class);
        $joursRepository = $em->getRepository(Jours::class);

        $heures = $heuresRepository->findAll();
        $jours = $joursRepository->findAll();

        $nh = count($heures);
        $nj = count($jours);
 
        $matriceEt = $etService->generateMatriceEt($niveaux,$heures,$jours);

        $parcours = $typeParcoursRepository->find($type);
        $niv = $niveauxRepository->findByType($type);

        return $this->render('emploi_du_temps/add.html.twig',
        [
            'parcour' => $parcours,
            'niveaux' => $niv,
            'status'=>$status,
            'n' => $niveaux,
            'jours' => $jours,
            'heures' => $heures,
            'matriceEt'=> $matriceEt,
            'nh' => $nh,
            'nj' => $nj
        ]
    );
    }
    /**
     * @Route("/ec/choice/{niveau}/{jour}/{heure}" , name="ec_choice", options = { "expose" = true },methods={"GET","POST"})
     */
    public function ecChoice(Request $request , $niveau , $jour , $heure)
    {
        $em = $this->getDoctrine()->getManager();
        $et = new EmploiDuTemps();

        $niveauxRepository = $em->getRepository(Niveaux::class);
        $ec_repository = $em->getRepository(EC::class);
        $joursRepository =$em->getRepository(Jours::class);
        $heuresRepository = $em->getRepository(Heures::class);
        $heures = $heuresRepository->find($heure);
        $jours = $joursRepository->find($jour);
        $niveaux = $niveauxRepository->find($niveau);
        //atreto aloha
        $form = $this->createForm(EcChoiceType::class,$et);

        $form->handleRequest($request);

        if($form->isSubmitted())
        {
            $et->setHeure($heures);
            $et->setJour($jours);
            $et->setNiveau($niveaux);
            $em->persist($et);
            $em->flush();
        }
        return $this->render('emploi_du_temps/ecChoice.html.twig',
        [
            'form' => $form->createView()
        ]);
    }
}
