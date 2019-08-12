<?php

namespace App\Controller;

use App\Entity\Etudiant;
use App\Entity\RepartitionEC;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\TypeParcours;
use App\Entity\AnneUniversitaire;
use App\Entity\Niveaux;
use App\Entity\Semestre;
use App\Entity\Note;
use App\Form\NoteType;
use App\Service\NoteService;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\EC;
use App\Entity\NoteUc;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * Require ROLE_ADMIN.
 *
 * @IsGranted("ROLE_ADMIN")
 */
class NoteAjouteController extends AbstractController
{
    /**
     * @Route("/note/ajoute/{type}/{niveaux}/{semestre}/{au}/{ratrapage}", name="note_ajoute",options = { "expose" = true })
     */
    public function index($type, $niveaux, $semestre, $au, $ratrapage, NoteService $noteService)
    {
        $status = "noteAjoute";
        $nbrEc = 0;
        $nbrEt = 0;

        $em = $this->getDoctrine()->getManager();
        $auRepository = $em->getRepository(AnneUniversitaire::class);
        $niveauxRepository = $em->getRepository(Niveaux::class);
        $semestreRepository = $em->getRepository(Semestre::class);
        $RepEcRepository = $em->getRepository(RepartitionEC::class);
        $typeParcoursRepository = $em->getRepository(TypeParcours::class);
        $etudiantRepository = $em->getRepository(Etudiant::class);
        $ecRepository = $em->getRepository(EC::class);

        $ecParNiveauxParSemestre = $RepEcRepository->findByNiveauxBySemestre($niveaux, $semestre);
        $auNow = $auRepository->find($au);
        $niv = $niveauxRepository->findByType($type);
        $sem = $semestreRepository->findSemestreByNiveaux($niveaux);
        $parcours = $typeParcoursRepository->find($type);
        $etudiant = $etudiantRepository->findByNiveauxOrderByName($niveaux);

        if ($ecParNiveauxParSemestre != null) {
            foreach ($ecParNiveauxParSemestre as $e) {
                $ecNom = $e->getEC()->getNom();
                $idEc = $e->getEC()->getId();
                $idEcOrd[] = $idEc;
                $ecOrd[] = $ecNom;
                $nbrEc = $nbrEc + 1;
            }
        }
        else {
            $ecOrd = NULL;
            $idEcOrd = NULL;
        }
        if ($etudiant != NULL) {
            foreach ($etudiant as $nt) {
                $nom = $nt->getNom();
                $idEt = $nt->getId();
                $idEtOrd[] = $idEt;
                $nomOrd[] = $nom;
                $nbrEt = $nbrEt + 1;
            }
        } else {
            $nomOrd = NULL;
            $idEtOrd = NULL;
        }
        $matriceNote = $noteService->generateMatriceNote($nomOrd, $ecOrd, $nbrEt, $nbrEc, $niveaux, $semestre, $au, $ratrapage);
        if($this->getUser()->getEnseignant() != null )
            $ec = $ecRepository->findEcByEnseignant($this->getUser()->getEnseignant()->getId());
        else
            $ec = null;


        return $this->render(
            'note_ajoute/ajoute.html.twig',
            [
                'status' => $status,
                'parcour' => $parcours,
                'auNow' => $auNow,
                'niveaux' => $niv,
                'auid' => $au,
                'rat' => $ratrapage,
                'n' => $niveaux,
                'semestres' => $sem,
                's' => $semestre,
                'rat' => $ratrapage,
                'ecOrd' => $ecOrd,
                'nomOrd' => $nomOrd,
                'idEcOrd' => $idEcOrd,
                'idEtOrd' => $idEtOrd,
                'nbrEc' => $nbrEc,
                'nbrEt' => $nbrEt,
                'matriceNote' => $matriceNote,
                'ec' => $ec
            ]
        );
    }

    /**
     * @Route("/note/formulaire/{etudiant}/{ec}/{semestre}/{niveau}/{au}/{ratrapage}" , name="note_ajoute_formulaire",options = { "expose" = true }, methods={"GET","POST"})
     */
    public function addNote(Request $request, $etudiant, $ec, $semestre, $niveau, $au, $ratrapage)
    {
        $status = 'addNoteForm';
        $em = $this->getDoctrine()->getManager();
        $etudiantRepository = $em->getRepository(Etudiant::class);
        $ecRepository = $em->getRepository(EC::class);
        $semestreRepository = $em->getRepository(Semestre::class);
        $niveauxRepository = $em->getRepository(Niveaux::class);
        $auRepository = $em->getRepository(AnneUniversitaire::class);
        $note_uc_repository = $em->getRepository(NoteUc::class);
        $note_repository = $em->getRepository(Note::class);

        $etudiantId = $etudiantRepository->find($etudiant);
        $ecId = $ecRepository->find($ec);
        $semestreId = $semestreRepository->find($semestre);
        $niveauId = $niveauxRepository->find($niveau);
        $auId = $auRepository->find($au);

        $note = new Note();

        $form = $this->createForm(NoteType::class, $note);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $note->setEtudiant($etudiantId);
            $note->setEC($ecId);
            $note->setSemestre($semestreId);
            $note->setNiveaux($niveauId);
            $note->setAnneUniversitaire($auId);
            $note->setIsRatrapage($ratrapage);

            //if note is not valide => test if is ratrapage
            if ($note->getValeur() < 10)
            {
                if($ratrapage == 1)
                {
                    //if is ratrapage set is_final a true
                    $note->setIsFinal(true);
                }
                //else is_final false
                else
                    $note->setIsFinal(false);

                $note->setIsValide(false);
            }
            //if note valide set is final
            else
            {
                $note->setIsFinal(true);
                $note->setIsValide(true);
            }

            $note->setValueCoeff(($note->getValeur()) * ($ecId->getCoefficient()));

            $uc = $note->getEC()->getUC();
            $id_uc = $uc->getId();
            //$note_uc = $note_uc_repository->find_by_uc_by_ratrapage_by_etudiant($id_uc, $ratrapage, $etudiant);
            $note_uc = $note_uc_repository->find_by_uc_by_ratrapage_by_etudiant($id_uc,$etudiant);

            //if note_uc doesn't exist => add
            if ($note_uc == null) {
                $note_uc_new = new NoteUc();
                $note_uc_new->setUc($uc);
                $note_uc_new->setEtudiant($etudiantId);
                $note_uc_new->setSemestre($semestreId);
                $note_uc_new->setAnneUniversitaire($auId);
                $note_uc_new->setNiveaux($niveauId);
                $note_uc_new->setValueCoeff(($note->getValueCoeff() * ($uc->getCoefficient())));
                $note_uc_new->setIsRatarapage($ratrapage);
                            
                //if note_uc is not valide => test if is ratrapage
                if ($note_uc_new->getValueCoeff() < 10) 
                {
                    if($ratrapage == 1)
                    {
                        //if is ratrapage set is_final true
                        $note_uc_new->setIsFinal(true);
                    }
                    //else is final false
                    else
                        $note_uc_new->setIsFinal(false);

                    $note_uc_new->setIsValide(false);
                    $note_uc_new->setCredit(0);
                }
                //if note_uc is valide 
                else 
                {
                    //set is_final true
                    $note_uc_new->setIsFinal(true);
                    $note_uc_new->setIsValide(true);
                    $note_uc_new->setCredit($uc->getCredit());
                }
                $note->setNoteUc($note_uc_new);
                $em->persist($note_uc_new);
            } 
            //if exist edit
            else 
            {
                $last_value_coeff = $note_uc['0']->getValueCoeff();
                //if note is ratrapage
                if($ratrapage == 1)
                {
                    //find last note value coeff
                    $last_note_of_uc = $note_repository->find_last_note_1_s($etudiant, $ec, $semestre, $niveau, $au);
                    $last_note_of_uc = $last_note_of_uc['0'];
                    //remove last note value
                    $last_note_of_uc_value = $last_note_of_uc->getValueCoeff();
                    $new_value_coeff = $last_value_coeff - $last_note_of_uc_value;                      
                    //add new note value 
                    $new_value_coeff = $new_value_coeff + ($note->getValueCoeff() * ($uc->getCoefficient()));
                }
                //else if is note ratrapage
                else
                {
                    //add new value 
                    $new_value_coeff = ($last_value_coeff) + ($note->getValueCoeff() * ($uc->getCoefficient()));
                }
                //if note_uc is not valide => test if is ratrapage
                if ($new_value_coeff < 10) {
                    if($note_uc['0']->getIsRatarapage() == 1)
                    {
                        //if is ratrapage set is_final true
                        $note_uc['0']->setIsFinal(true);
                    }
                    //else set is final false
                    else
                        $note_uc['0']->setIsFinal(false);
                    $note_uc['0']->setIsValide(false);
                    $note_uc['0']->setCredit(0);
                } 
                //if note_uc is valide 
                else 
                {
                    //set is_final true
                    $note_uc['0']->setIsFinal(true);
                    $note_uc['0']->setIsValide(true);
                    $note_uc['0']->setCredit($uc->getCredit());
                }
                $note_uc['0']->setValueCoeff($new_value_coeff);
                $note->setNoteUc($note_uc['0']);
                $em->persist($note_uc['0']);
            }
            $em->persist($note);
            $em->flush();
        }
        return $this->render(
            'note_ajoute/noteFormAjoute.html.twig',
            [
                'form' => $form->createView(),
                'status' => $status
            ]
        );
    }

    /**
     * @Route("/confirmeSupressionNote/{etudiant}/{ec}/{semestre}/{niveau}/{au}/{ratrapage}/{valeur}" , name="confirmeSupressionNote",options = { "expose" = true })
     */
    public function confirmeSupression($etudiant, $ec, $semestre, $niveau, $au, $ratrapage, $valeur)
    {
        $em = $this->getDoctrine()->getManager();
        $noteRepository = $em->getRepository(Note::class);
        $note = $noteRepository->findByNote($etudiant, $ec, $semestre, $niveau, $au, $ratrapage, $valeur);

        return $this->render('note_ajoute/confirmeSupression.html.twig', [
            'note' => $note,
            'etudiant' => $etudiant,
            'ec' => $ec,
            'semestre' => $semestre,
            'niveau' => $niveau,
            'au' => $au,
            'ratrapage' => $ratrapage,
        ]);
    }

    /**
     * @Route("note/delete/{noteId}/{niveaux}/{semestre}/{au}/{ratrapage}", name="deleteNote",options = { "expose" = true })
     */
    public function delete($noteId, $niveaux, $semestre, $au, $ratrapage)
    {
        $em = $this->getDoctrine()->getManager();
        $noteRepository = $em->getRepository(Note::class);
        $note_uc_repository = $em->getRepository(NoteUc::class);
        
        //recupere la note
        $note = $noteRepository->find($noteId);

        //recuperer l'id du note
        $id_note_uc = $note->getNoteUc()->getId();

        //recupération du note_uc
        $note_uc = $note_uc_repository->find($id_note_uc);

        //recuperer la dernier valeur de note_uc
        $last_value_coeff = $note_uc->getValueCoeff();
        //recupere la valeur du note a enlever
        $note_value_with_coeff = $note->getValueCoeff();

        //enlever la valeur du note
        $new_value_coeff = $last_value_coeff - $note_value_with_coeff;

        if ($new_value_coeff < 10) {
            $note_uc->setIsValide(false);
            $note_uc->setCredit(0);
        } else {
            $note_uc->setIsValide(true);
            $note_uc->setCredit($note_uc->getUc()->getCoefficient());
        }
        if ($new_value_coeff == 0) {
            $em->remove($note_uc);
        } else {
            $note_uc->setValueCoeff($new_value_coeff);
            $em->persist($note_uc);
        }

        $type = $note->getNiveaux()->getType()->getId();
        $em->remove($note);
        $em->flush();

        return $this->redirectToRoute(
            'note_ajoute',
            [
                'type' => $type,
                'niveaux' => $niveaux,
                'semestre' => $semestre,
                'au' => $au,
                'ratrapage' => $ratrapage
            ]
        );
    }
    /**
     * @Route("/editNote/{etudiant}/{ec}/{semestre}/{niveau}/{au}/{ratrapage}/{valeur}" , name="editNote",options = { "expose" = true },methods={"GET","POST"})
     */
    public function editNote(Request $request, $etudiant, $ec, $semestre, $niveau, $au, $ratrapage, $valeur)
    {
        $em = $this->getDoctrine()->getManager();
        $noteRepository = $em->getRepository(Note::class);
        $note = $noteRepository->findByNote($etudiant, $ec, $semestre, $niveau, $au, $ratrapage, $valeur);
        $note = $note['0'];

        $form = $this->createForm(NoteType::class, $note);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            if ($note->getValeur() < 10)
                $note->setIsValide(false);
            else
                $note->setIsValide(true);
            $em->persist($note);
            $em->flush();
        }
        return $this->render(
            'note_ajoute/noteFormAjoute.html.twig',
            [
                'form' => $form->createView(),
            ]
        );
    }
}
