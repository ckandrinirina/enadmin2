<?php

namespace App\Controller;

use App\Entity\Etudiant;
use App\Entity\Niveaux;
use App\Entity\Note;
use App\Entity\Semestre;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\NoteUc;

class FicheIndividuelController extends AbstractController
{
    /**
     * @Route("/fiche/individuel/{etudiant}/{type}/{niveaux}", name="fiche_individuel")
     */
    public function index($etudiant, $type, $niveaux)
    {
        $status = "listE";

        $em = $this->getDoctrine()->getManager();

        $etudiantRepository = $em->getRepository(Etudiant::class);
        $ficheRepository = $em->getRepository(Note::class);
        $semestreRepository = $em->getRepository(Semestre::class);
        $niveauxRepository = $em->getRepository(Niveaux::class);

        $niv = $niveauxRepository->findByType($type);
        $semestre = $semestreRepository->findSemestreByNiveaux($niveaux);
        $etudiant = $etudiantRepository->find($etudiant);
        $fiche = $ficheRepository->findByEtudiant($etudiant);

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
     * @Route("/fiche/note/{etudiant}/{niveaux}/{semestre}/{ratrapage}", name="fiche_note")
     */
    public function fiche_de_note($etudiant, $niveaux, $semestre, $ratrapage)
    {
        $em = $this->getDoctrine()->getManager();
        $status = 'fiche de note';
        $etudiant_repository = $em->getRepository(Etudiant::class);
        $niveauxRepository = $em->getRepository(Niveaux::class);
        $semestreRepository = $em->getRepository(Semestre::class);
        $note_ue_repository = $em->getRepository(NoteUc::class);

        $note_ue = $note_ue_repository->fin_by_e_n_s_r($etudiant, $niveaux, $semestre, $ratrapage);
        $etudiant_info = $etudiant_repository->find($etudiant);
        $type = $etudiant_info->getParcour()->getId();
        $sem = $semestreRepository->findSemestreByNiveaux($niveaux);
        $i = 0;
        $somme = 0;
        $credit_aquis = 0;
        foreach ($note_ue as $n_ue) {
            $somme = $somme + $n_ue->getValueCoeff();
            $i = $i + 1;
            $credit_aquis = $credit_aquis + $n_ue->getCredit();
        }
        if ($i != 0)
            $moyenne = $somme / $i;
        else
            $moyenne = 0;

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
                'credit_aquis' => $credit_aquis
            ]
        );
    }

    /**
     * @Route("/fiche/note/pdf/{etudiant}/{niveaux}/{semestre}/{ratrapage}", name="fiche_note_pdf")
     */
    public function fiche_de_note_pdf($etudiant, $niveaux, $semestre, $ratrapage)
    {
        $em = $this->getDoctrine()->getManager();
        $status = 'fiche de note';
        $etudiant_repository = $em->getRepository(Etudiant::class);
        $niveauxRepository = $em->getRepository(Niveaux::class);
        $semestreRepository = $em->getRepository(Semestre::class);
        $note_ue_repository = $em->getRepository(NoteUc::class);

        $note_ue = $note_ue_repository->fin_by_e_n_s_r($etudiant, $niveaux, $semestre, $ratrapage);
        $etudiant_info = $etudiant_repository->find($etudiant);
        $type = $etudiant_info->getParcour()->getId();
        $sem = $semestreRepository->findSemestreByNiveaux($niveaux);
        $i = 0;
        $somme = 0;
        $credit_aquis = 0;
        foreach ($note_ue as $n_ue) {
            $somme = $somme + $n_ue->getValueCoeff();
            $i = $i + 1;
            $credit_aquis = $credit_aquis + $n_ue->getCredit();
        }
        if ($i != 0)
            $moyenne = $somme / $i;
        else
            $moyenne = 0;

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
                'credit_aquis' => $credit_aquis
            ]
        );
    }
}
