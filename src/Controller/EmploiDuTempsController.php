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
use App\Entity\Semestre;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use App\Entity\Parametrage;


class EmploiDuTempsController extends AbstractController
{
    /**
     * @Route("/emploi/du/temps/{type}/{niveaux}/{semestre}", name="etemps")
     * Vous n'avez pas le permission de voir cette page.
     *
     * @IsGranted("ROLE_USER")
     */
    public function index(EtService $etService, $type, $niveaux, $semestre)
    {
        $status = 'etemps';
        $em = $this->getDoctrine()->getManager();
        $typeParcoursRepository = $em->getRepository(TypeParcours::class);
        $niveauxRepository = $em->getRepository(Niveaux::class);
        $semestreRepository = $em->getRepository(Semestre::class);
        $heuresRepository = $em->getRepository(Heures::class);
        $joursRepository = $em->getRepository(Jours::class);
        $heures = $heuresRepository->findAll();
        $jours = $joursRepository->findAll();

        $parcours = $typeParcoursRepository->find($type);
        $niv = $niveauxRepository->findByType($type);
        $sem = $semestreRepository->findSemestreByNiveaux($niveaux);
        $matriceEt = $etService->generateMatriceEt($niveaux, $heures, $jours, $semestre);

        return $this->render(
            'emploi_du_temps/index.html.twig',
            [
                'parcour' => $parcours,
                'niveaux' => $niv,
                'status' => $status,
                'n' => $niveaux,
                'jours' => $jours,
                'heures' => $heures,
                'matriceEt' => $matriceEt,
                'semestre' => $semestre,
                'semestres' => $sem,
                's' => $semestre,
            ]
        );
    }

    /**
     * @Route("/emploi/du/temps/pdf/{type}/{niveaux}/{semestre}", name="etemps_pdf")
     * Vous n'avez pas le permission de voir cette page.
     *
     * @IsGranted("ROLE_USER")
     */
    public function index_pdf(EtService $etService, $type, $niveaux, $semestre)
    { 
        $status = 'etemps';
        $em = $this->getDoctrine()->getManager();
        $typeParcoursRepository = $em->getRepository(TypeParcours::class);
        $niveauxRepository = $em->getRepository(Niveaux::class);
        $semestreRepository = $em->getRepository(Semestre::class);
        $heuresRepository = $em->getRepository(Heures::class);
        $joursRepository = $em->getRepository(Jours::class);
        $etRepository = $em->getRepository(EmploiDuTemps::class);
        $chef_mention_repository = $em->getRepository(Parametrage::class);

        $chef_mention = $chef_mention_repository->find('1');

        $heures = $heuresRepository->findAll();
        $jours = $joursRepository->findAll();
        $i=0;
        foreach($jours as $jour)
        {
            $et[$i] = $etRepository->find_by_niveaux_semestres_jours($niveaux,$semestre,$jour);
            $i++;
        }
        $parcours = $typeParcoursRepository->find($type);
        $niv = $niveauxRepository->findByType($type);
        $sem = $semestreRepository->findSemestreByNiveaux($niveaux);

        return $this->render(
            'emploi_du_temps/index_pdf.html.twig',
            [
                'parcour' => $parcours,
                'niveaux' => $niv,
                'status' => $status,
                'n' => $niveaux,
                'jours' => $jours,
                'heures' => $heures,
                'semestre' => $semestre,
                'semestres' => $sem,
                's' => $semestre,
                'et' => $et,
                'chef_mention' => $chef_mention
            ]
        );
    }
    /**
     * @Route("/emploi/du/temps/add/{type}/{niveaux}/{semestre}", name="add_etemps",options = { "expose" = true })
     * 
     * Require ROLE_ADMIN for only this controller method.
     * 
     *  @IsGranted("ROLE_ADMIN")
     */
    public function add($type, $niveaux, $semestre, EtService $etService)
    {
        $status = 'etemps';
        $em = $this->getDoctrine()->getManager();
        $typeParcoursRepository = $em->getRepository(TypeParcours::class);
        $niveauxRepository = $em->getRepository(Niveaux::class);
        $semestreRepository = $em->getRepository(Semestre::class);
        $heuresRepository = $em->getRepository(Heures::class);
        $joursRepository = $em->getRepository(Jours::class);

        $heures = $heuresRepository->findAll();
        $jours = $joursRepository->findAll();

        $nh = count($heures);
        $nj = count($jours);

        $matriceEt = $etService->generateMatriceEt($niveaux, $heures, $jours, $semestre);

        $parcours = $typeParcoursRepository->find($type);
        $niv = $niveauxRepository->findByType($type);
        $sem = $semestreRepository->findSemestreByNiveaux($niveaux);

        return $this->render(
            'emploi_du_temps/add.html.twig',
            [
                'parcour' => $parcours,
                'niveaux' => $niv,
                'status' => $status,
                'n' => $niveaux,
                'jours' => $jours,
                'heures' => $heures,
                'matriceEt' => $matriceEt,
                'nh' => $nh,
                'nj' => $nj,
                'semestre' => $semestre,
                'semestres' => $sem,
                's' => $semestre,
            ]
        );
    }
    /**
     * @Route("/ec/choice/{niveau}/{jour}/{heure}/{semestre}" , name="ec_choice", options = { "expose" = true },methods={"GET","POST"})
     * Vous n'avez pas le permission de voir cette page.
     *
     * @IsGranted("ROLE_USER")
     */
    public function ecChoice(Request $request, $niveau, $jour, $heure, $semestre)
    {
        $em = $this->getDoctrine()->getManager();
        $et = new EmploiDuTemps();

        $niveauxRepository = $em->getRepository(Niveaux::class);
        $semestreRepository = $em->getRepository(Semestre::class);
        $joursRepository = $em->getRepository(Jours::class);
        $heuresRepository = $em->getRepository(Heures::class);
        $repartionRepository = $em->getRepository(RepartitionEC::class);
        $ecRepository = $em->getRepository(EC::class);

        $heures = $heuresRepository->find($heure);
        $jours = $joursRepository->find($jour);
        $niveaux = $niveauxRepository->find($niveau);
        $sem = $semestreRepository->find($semestre);

        $ec = $repartionRepository->findByNiveauxBySemestre($niveau, $semestre);
        $i = 0;

        foreach ($ec as $e) {
            $ec_value[$i] = $ecRepository->find($e->getEc());
            $i = $i + 1;
        }
        if(isset($ec_value))
            $option['data'] = $ec_value;
        else
            $option['data'] = null;
        //atreto aloha
        $form = $this->createForm(EcChoiceType::class, $et, $option);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $data = $form->getData();
            $et->setHeure($heures);
            $et->setJour($jours);
            $et->setNiveau($niveaux);
            $et->setSemestre($sem);
            $et->setEc($data['ec']);
            $em->persist($et);
            $em->flush();
        }
        return $this->render(
            'emploi_du_temps/ecChoice.html.twig',
            [
                'form' => $form->createView()
            ]
        );
    }

    /**
     * @Route("/confirmeSupression_et/{niveau}/{jour}/{heure}/{semestre}" , name="confirmeSupression_et",options = { "expose" = true })
     * Vous n'avez pas le permission de voir cette page.
     *
     * @IsGranted("ROLE_USER")
     */
    public function confirmeSupression($niveau, $jour, $heure, $semestre)
    {
        $em = $this->getDoctrine()->getManager();
        $etRepository = $em->getRepository(EmploiDuTemps::class);
        $et = $etRepository->specialFindOne($niveau, $heure, $jour, $semestre);
        return $this->render('emploi_du_temps/confirmeSupression.html.twig', [
            'et' => $et,
            'jour' => $jour,
            'heure' => $heure,
            'semestre' => $semestre,
            'niveau' => $niveau,
        ]);
    }
    /**
     * @Route("emploi-du-temps/delete/{niveau}/{jour}/{heure}/{semestre}/{etId}", name="deletEt",options = { "expose" = true })
     * Vous n'avez pas le permission de voir cette page.
     *
     * @IsGranted("ROLE_USER")
     */
    public function delete($niveau, $jour, $heure, $semestre, $etId)
    {
        $em = $this->getDoctrine()->getManager();
        $etRepository = $em->getRepository(EmploiDuTemps::class);
        $niveauxRepository = $em->getRepository(Niveaux::class);

        $niv = $niveauxRepository->find($niveau);
        $et = $etRepository->find($etId);
        $em->remove($et);
        $em->flush();
        return $this->redirectToRoute(
            'add_etemps',
            [
                'type' => $niv->getType()->getId(),
                'jour' => $jour,
                'heure' => $heure,
                'semestre' => $semestre,
                'niveaux' => $niveau,
            ]
        );
    }
}
