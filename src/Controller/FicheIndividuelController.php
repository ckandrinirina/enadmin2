<?php

namespace App\Controller;

use App\Entity\Etudiant;
use App\Entity\Niveaux;
use App\Entity\Note;
use App\Entity\Semestre;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\NoteUc;
use App\Entity\AnneUniversitaire;
use App\Entity\Moyenne;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use App\Entity\Scolarite;
use App\Service\NoteService;

class FicheIndividuelController extends AbstractController
{
    /**
     * @Route("/fiche/individuel/{etudiant}/{type}/{niveaux}", name="fiche_individuel")
     *
     * Require ROLE_ADMIN for only this controller method.
     *
     * @IsGranted("ROLE_ADMIN")
     */
    public function index($etudiant, $type, $niveaux)
    {
        $status = "listE";

        $em = $this->getDoctrine()->getManager();

        $etudiantRepository = $em->getRepository(Etudiant::class);
        $semestreRepository = $em->getRepository(Semestre::class);
        $niveauxRepository = $em->getRepository(Niveaux::class);

        $niv = $niveauxRepository->findByType($type);
        $semestre = $semestreRepository->findSemestreByNiveaux($niveaux);
        $etudiant = $etudiantRepository->find($etudiant);
        //$fiche = $ficheRepository->findByEtudiant($etudiant);

        return $this->render(
            'fiche_individuel/fiche.html.twig',
            [
                'status' => $status,
                'etudiant' => $etudiant,
                'semestres' => $semestre,
                'n' => $niveaux,
                'type' => $type,
                'niveaux' => $niv
            ]
        );
    }

    /**
     * @Route("/invalide/{etudiant}/{semestre}/{niveaux}" , name="premier_session")
     * Vous n'avez pas le permission de voir cette page.
     *
     * @IsGranted("ROLE_USER")
     */
    public function invalideNote($etudiant, $semestre, $niveaux)
    {
        $message = '';
        $em = $this->getDoctrine()->getManager();
        $noteRepository = $em->getRepository(Note::class);
        $etudiantRepository = $em->getRepository(Etudiant::class);

        $et = $etudiantRepository->find($etudiant);

        if ($et->getNiveaux()->getId() < $niveaux)
            $message = 'pas encore ajouté';

        $invalideNote = $noteRepository->findInvalideNote($etudiant, $semestre);

        return $this->render(
            'fiche_individuel/result.html.twig',
            [
                'invalideNote' => $invalideNote,
                'message' => $message
            ]
        );
    }

    /**
     * @Route("/invalide/{niveaux}/{semestre}" , name="deuxiem_session")
     * Vous n'avez pas le permission de voir cette page.
     *
     * @IsGranted("ROLE_USER")
     */
    public function invalideNote2($etudiant, $niveaux)
    {
        $message = 0;
        $em = $this->getDoctrine()->getManager();
        $noteRepository = $em->getRepository(Note::class);
        $etudiantRepository = $em->getRepository(Etudiant::class);

        $et = $etudiantRepository->find($etudiant);

        if ($et->getNiveaux()->getId() < $niveaux)
            $message = 1;

        $invalideNote = $noteRepository->findInvalideNote2($etudiant, $niveaux);

        return $this->render(
            'fiche_individuel/result.html.twig',
            [
                'invalideNote' => $invalideNote,
                'message' => $message
            ]
        );
    }

    /**
     * @Route("/fiche-note/{etudiant}/{niveaux}/{semestre}/{ratrapage}", name="fiche_note")
     * Vous n'avez pas le permission de voir cette page.
     *
     * @IsGranted("ROLE_USER")
     */
    public function fiche_de_note($etudiant, $niveaux, $semestre, $ratrapage, NoteService $note_service)
    {
        if($this->getUser()->getEtudiant() != null)
        {
            if($this->getUser()->getEtudiant()->getId() != $etudiant)
                return $this->redirectToRoute('accueil');
        }
        $em = $this->getDoctrine()->getManager();
        $status = 'fiche de note';
        $etudiant_repository = $em->getRepository(Etudiant::class);
        $niveauxRepository = $em->getRepository(Niveaux::class);
        $semestreRepository = $em->getRepository(Semestre::class);
        $note_ue_repository = $em->getRepository(NoteUc::class);
        $auRepository = $em->getRepository(AnneUniversitaire::class);
        $moyenne_repository = $em->getRepository(Moyenne::class);
        $scolarite_repository = $em->getRepository(Scolarite::class);

        // $allAu = $auRepository->findAllByOrder();
        // $auNow = $auRepository->find($au);
        $etudiant_full = $etudiant_repository->find($etudiant);

        $note_ue = $note_ue_repository->fin_by_e_n_s_r($etudiant, $niveaux, $semestre, $ratrapage);
        //dump($note_ue);die();
        $moyenne = $moyenne_repository->find_by_e_s_n_au($etudiant, $semestre, $niveaux);

        $scolarite_actuel = $scolarite_repository->get_actual_scolarite($etudiant_full);

        if($moyenne != null)
            $moyenne = $moyenne['0'];
        else
            $moyenne = null;

        $etudiant_info = $etudiant_repository->find($etudiant);
        $type = $etudiant_info->getParcour()->getId();
        $sem = $semestreRepository->findSemestreByNiveaux($niveaux);

        // $credit_aquis = 0;
        // $moyenne = $note_service->calculate_moyenne($note_ue);
        // foreach ($note_ue as $n_ue)
        // {
        //     $credit_aquis = $credit_aquis + $n_ue->getCredit();
        // }

        $niv = $niveauxRepository->findByType($type);
        return $this->render(
            'fiche_individuel/fiche_de_note.html.twig',
            [
                'status' => $status,
                'niveaux' => $niv,
                'n' => $niveaux,
                'etudiant' => $etudiant_info,
                'rat' => $ratrapage,
                'semestres' => $sem,
                's' => $semestre,
                'e' => $etudiant,
                'r' => $ratrapage,
                'note_ue' => $note_ue,
                'moyenne' => $moyenne,
                'scolarite_actuel'=> $scolarite_actuel
            ]
        );
    }

    /**
     * @Route("/fiche-note-pdf/{etudiant}/{niveaux}/{semestre}/{ratrapage}", name="fiche_note_pdf")
     *
     * Require ROLE_SUPER_ADMIN for only this controller method.
     *
     *  @IsGranted("ROLE_ADMIN")
     */
    public function fiche_de_note_pdf($etudiant, $niveaux, $semestre, $ratrapage)
    {
        $em = $this->getDoctrine()->getManager();
        $status = 'fiche de note';
        $etudiant_repository = $em->getRepository(Etudiant::class);
        $niveauxRepository = $em->getRepository(Niveaux::class);
        $semestreRepository = $em->getRepository(Semestre::class);
        $note_ue_repository = $em->getRepository(NoteUc::class);
        $scolarite_repository = $em->getRepository(Scolarite::class);
        $moyenne_repository = $em->getRepository(Moyenne::class);

        $note_ue = $note_ue_repository->fin_by_e_n_s_r($etudiant, $niveaux, $semestre, $ratrapage);
        $moyenne = $moyenne_repository->find_by_e_s_n_au($etudiant, $semestre, $niveaux);

        $etudiant_info = $etudiant_repository->find($etudiant);
        $type = $etudiant_info->getParcour()->getId();
        $sem = $semestreRepository->findSemestreByNiveaux($niveaux);

        $scolarite_actuel = $scolarite_repository->get_actual_scolarite($etudiant_info);

        if($scolarite_actuel != null )
            $scolarite_actuel = $scolarite_actuel['0'];
        else
            $scolarite_actuel = null;
        
        if($moyenne != null)
            $moyenne = $moyenne['0'];
        else
            $moyenne = null;

        $niv = $niveauxRepository->findByType($type);
        return $this->render(
            'fiche_individuel/fiche_de_note_pdf.html.twig',
            [
                'status' => $status,
                'niveaux' => $niv,
                'n' => $niveaux,
                'etudiant' => $etudiant_info,
                'rat' => $ratrapage,
                'semestres' => $sem,
                's' => $semestre,
                'e' => $etudiant,
                'r' => $ratrapage,
                'note_ue' => $note_ue,
                'moyenne' => $moyenne,
                'scolarite'=>$scolarite_actuel
            ]
        );
    }
}
