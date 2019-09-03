<?php

namespace App\Controller;

use App\Entity\AnneUniversitaire;
use App\Entity\Note;
use App\Entity\Semestre;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\TypeParcours;
use App\Entity\Niveaux;
use App\Service\NoteService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class NoteListController extends AbstractController
{
    /**
     * @Route("/notelist/{type}/{niveaux}/{semestre}/{au}/{ratrapage}", name="note_list")
     * 
     * Require ROLE_ADMIN.
     *
     * @IsGranted("ROLE_ADMIN")
     */
    public function index($type, $niveaux, $semestre, $au, $ratrapage, NoteService $noteService)
    {
        $em = $this->getDoctrine()->getManager();
        $nbrNom = 0;
        $nbrEc = 0;
        $nom = '';
        $ecNom = '';
        $status = 'notelist';
        $nomOrd = NULL;
        $ecOrd = NULL;
        $matriceNote[][] = NULL;

        $typeParcoursRepository = $em->getRepository(TypeParcours::class);
        $niveauxRepository = $em->getRepository(Niveaux::class);
        $noteRepository = $em->getRepository(Note::class);
        $semestreRepository = $em->getRepository(Semestre::class);
        $auRepository = $em->getRepository(AnneUniversitaire::class);

        $allAu = $auRepository->findAllByOrder();
        $auNow = $auRepository->find($au);
        $note = $noteRepository->findByNiveauxBySemestreEtudiant($niveaux, $semestre, $au, $ratrapage);
        $ec = $noteRepository->findByNiveauxBySemestreEC($niveaux, $semestre, $au, $ratrapage);
        $niv = $niveauxRepository->findByType($type);
        $sem = $semestreRepository->findSemestreByNiveaux($niveaux);
        $parcours = $typeParcoursRepository->find($type);
        
        if ($note != null ) {
            foreach ($note as $nt) {
                $nom = $nt->getEtudiant()->getNom().' '.$nt->getEtudiant()->getPrenom();
                $nomOrd[] = $nom;
                $nbrNom = $nbrNom + 1;
                $idEt = $nt->getEtudiant()->getId();
                $idEtOrd[] = $idEt;
            }
        } else {
            $nomOrd = NULL;
            $idEtOrd = NULL;
        }

        if (isset($ec)) {
            foreach ($ec as $e) {
                if ($e->getEC()->getNom() != $ecNom) {
                    $ecNom = $e->getEC()->getNom();
                    $ecOrd[] = $ecNom;
                    $nbrEc = $nbrEc + 1;
                }
            }
        } else {
            $ecOrd = NULL;
        }

        //$matriceNote = $noteService->generateMatriceNote($nomOrd, $ecOrd, $nbrNom, $nbrEc, $niveaux, $semestre, $au, $ratrapage);

        $matriceNote = $noteService->generateMatriceNote2($idEtOrd, $ecOrd, $nbrNom, $nbrEc, $niveaux, $semestre, $au, $ratrapage);

        return $this->render(
            'note_list/list.html.twig',
            [
                'status' => $status,
                'parcour' => $parcours,
                'niveaux' => $niv,
                'semestres' => $sem,
                'n' => $niveaux,
                's' => $semestre,
                'nomOrd' => $nomOrd,
                'ecOrd' => $ecOrd,
                'matriceNote' => $matriceNote,
                'auid' => $au,
                'allAu' => $allAu,
                'auNow' => $auNow,
                'rat' => $ratrapage
            ]
        );
    }

    /**
     * @Route("/noteresult/{type}/{niveaux}/{semestre}/{au}/{ratrapage}", name="note_result")
     */
    public function note_result($type, $niveaux, $semestre, $au, $ratrapage, NoteService $noteService)
    {
        $em = $this->getDoctrine()->getManager();
        $nbrNom = 0;
        $nbrEc = 0;
        $nom = '';
        $ecNom = '';
        $status = 'noteresult';
        $nomOrd = NULL;
        $ecOrd = NULL;
        $matriceNote[][] = NULL;

        $typeParcoursRepository = $em->getRepository(TypeParcours::class);
        $niveauxRepository = $em->getRepository(Niveaux::class);
        $noteRepository = $em->getRepository(Note::class);
        $semestreRepository = $em->getRepository(Semestre::class);
        $auRepository = $em->getRepository(AnneUniversitaire::class);

        $allAu = $auRepository->findAllByOrder();
        $auNow = $auRepository->find($au);
        $note = $noteRepository->findByNiveauxBySemestreEtudiant($niveaux, $semestre, $au, $ratrapage);
        $ec = $noteRepository->findByNiveauxBySemestreEC($niveaux, $semestre, $au, $ratrapage);
        $niv = $niveauxRepository->findByType($type);
        $sem = $semestreRepository->findSemestreByNiveaux($niveaux);
        $parcours = $typeParcoursRepository->find($type);

        if (isset($note)) {
            foreach ($note as $nt) {
                if ($nt->getEtudiant()->getNom() != $nom) {
                    $nom = $nt->getEtudiant()->getNom();
                    $nomOrd[] = $nom;
                    $nbrNom = $nbrNom + 1;
                }
            }
        } else {
            $nomOrd = NULL;
        }

        if (isset($ec)) {
            foreach ($ec as $e) {
                if ($e->getEC()->getNom() != $ecNom) {
                    $ecNom = $e->getEC()->getNom();
                    $ecOrd[] = $ecNom;
                    $nbrEc = $nbrEc + 1;
                }
            }
        } else {
            $ecOrd = NULL;
        }

        $matriceNote = $noteService->generateMatriceNote($nomOrd, $ecOrd, $nbrNom, $nbrEc, $niveaux, $semestre, $au, $ratrapage);

        return $this->render(
            'note_list/result.html.twig',
            [
                'status' => $status,
                'parcour' => $parcours,
                'niveaux' => $niv,
                'semestres' => $sem,
                't' => $type,
                'n' => $niveaux,
                's' => $semestre,
                'auid' => $au,
                'rat' => $ratrapage,
                'nomOrd' => $nomOrd,
                'ecOrd' => $ecOrd,
                'matriceNote' => $matriceNote,
                'allAu' => $allAu,
                'auNow' => $auNow,
            ]
        );
    }
    /**
     * @Route("/noteresult/pdf/{type}/{niveaux}/{semestre}/{au}/{ratrapage}", name="note_result_pdf")
     */
    public function note_result_pdf($type, $niveaux, $semestre, $au, $ratrapage, NoteService $noteService)
    {
        $em = $this->getDoctrine()->getManager();
        $nbrNom = 0;
        $nbrEc = 0;
        $nom = '';
        $ecNom = '';
        $status = 'noteresult';
        $nomOrd = NULL;
        $ecOrd = NULL;
        $matriceNote[][] = NULL;

        $typeParcoursRepository = $em->getRepository(TypeParcours::class);
        $niveauxRepository = $em->getRepository(Niveaux::class);
        $noteRepository = $em->getRepository(Note::class);
        $semestreRepository = $em->getRepository(Semestre::class);
        $auRepository = $em->getRepository(AnneUniversitaire::class);

        $allAu = $auRepository->findAllByOrder();
        $auNow = $auRepository->find($au);
        $note = $noteRepository->findByNiveauxBySemestreEtudiant($niveaux, $semestre, $au, $ratrapage);
        $ec = $noteRepository->findByNiveauxBySemestreEC($niveaux, $semestre, $au, $ratrapage);
        $niv = $niveauxRepository->findByType($type);
        $sem = $semestreRepository->findSemestreByNiveaux($niveaux);
        $parcours = $typeParcoursRepository->find($type);
        $nivOne = $niveauxRepository->find($niveaux);
        $semOne = $semestreRepository->find($semestre);

        if (isset($note)) {
            foreach ($note as $nt) {
                if ($nt->getEtudiant()->getNom() != $nom) {
                    $nom = $nt->getEtudiant()->getNom();
                    $nomOrd[] = $nom;
                    $nbrNom = $nbrNom + 1;
                }
            }
        } else {
            $nomOrd = NULL;
        }

        if (isset($ec)) {
            foreach ($ec as $e) {
                if ($e->getEC()->getNom() != $ecNom) {
                    $ecNom = $e->getEC()->getNom();
                    $ecOrd[] = $ecNom;
                    $nbrEc = $nbrEc + 1;
                }
            }
        } else {
            $ecOrd = NULL;
        }

        $matriceNote = $noteService->generateMatriceNote($nomOrd, $ecOrd, $nbrNom, $nbrEc, $niveaux, $semestre, $au, $ratrapage);

        return $this->render(
            'note_list/result_pdf.html.twig',
            [
                'status' => $status,
                'parcour' => $parcours,
                'niveaux' => $niv,
                'semestres' => $sem,
                't' => $type,
                'n' => $niveaux,
                's' => $semestre,
                'auid' => $au,
                'rat' => $ratrapage,
                'nomOrd' => $nomOrd,
                'ecOrd' => $ecOrd,
                'matriceNote' => $matriceNote,
                'allAu' => $allAu,
                'auNow' => $auNow,
                'nivOne' => $nivOne,
                'semOne' => $semOne
            ]
        );
    }
}
