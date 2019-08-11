<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use App\Entity\Etudiant;
use App\Entity\Niveaux;
use App\Entity\TypeParcours;
use App\Entity\User;
use App\Form\NiveauxChoiceType;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\NoteUc;
use App\Entity\UC;
use App\Service\NoteService;

class DeliberationController extends AbstractController
{
    /**
     * @Route("/deliberation-final/{type}/{niveaux}", name="deliberation_final")
     * 
     * Require ROLE_SUPER_ADMIN for only this controller method.
     * 
     *  @IsGranted("ROLE_SUPER_ADMIN")
     */
    public function index($type, $niveaux,NoteService $note_service)
    {
        $status = 'deliberation';

        $em = $this->getDoctrine()->getManager();

        $typeParcoursRepository = $em->getRepository(TypeParcours::class);
        $niveauxRepository = $em->getRepository(Niveaux::class);
        $etudiantRepository = $em->getRepository(Etudiant::class);
        $note_uc_repository = $em->getRepository(NoteUc::class);
        $uc_repository = $em->getRepository(UC::class);

        $parcours = $typeParcoursRepository->find($type);
        $niv = $niveauxRepository->findByType($type);
        $niveaux_form = $niveauxRepository->find($niveaux);
        $etudiants = $etudiantRepository->findByNiveaux($niveaux);

        if ($etudiants != null) {
            foreach ($etudiants as $e) {
                $form[$e->getId()] = $this->createForm(NiveauxChoiceType::class);
                $view_form[$e->getId()] = $form[$e->getId()]->createView();
                //find note_uc for semestre
                $note_uc[$e->getId()]['0'] = $note_uc_repository->find_by_etudiant_by_niveaux($e->getId(),$e->getNiveaux()->getId(),$e->getNiveaux()->getSemestres()['0']->getId());
                //calculate moyenne semestre impaire
                $moyenne_s_impaire[$e->getId()] = $note_service->calculate_moyenne($note_uc[$e->getId()]['0']);
                //find note_uc for semestre paire
                $note_uc[$e->getId()]['1'] = $note_uc_repository->find_by_etudiant_by_niveaux($e->getId(),$e->getNiveaux()->getId(),$e->getNiveaux()->getSemestres()['1']->getId());
                //calculate moyenne semestre paire
                $moyenne_s_paire[$e->getId()] = $note_service->calculate_moyenne($note_uc[$e->getId()]['1']);
            }
        }
        else 
        {
            $view_form = null;
        }

        return $this->render('deliberation/index.html.twig', [
            'parcour' => $parcours,
            'niveaux' => $niv,
            'status' => $status,
            'n' => $niveaux,
            'etudiants' => $etudiants,
            'view_form' => $view_form,
            'note_uc' => $note_uc,
            'moyenne_impaire' => $moyenne_s_impaire,
            'moyenne_paire' => $moyenne_s_paire,
        ]);
    }


    /**
     * @Route("/change_admis/{id}", name="admis")
     * 
     * Require ROLE_SUPER_ADMIN for only this controller method.
     * 
     *  @IsGranted("ROLE_SUPER_ADMIN")
     * 
     */
    public function change_niveaux(Etudiant $etudiant, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $result = $request->request->all();
        $result = $result['niveaux_choice'];
        $niveaux_repository = $em->getRepository(Niveaux::class);
        if ($result['_token']) {
            $etudiant_class = $niveaux_repository->find($result['niveaux']);
            $etudiant->setNiveaux($etudiant_class);
            $em->persist($etudiant);
            $em->flush();
            return $this->redirectToRoute('deliberation_final', ['type' => $etudiant->getParcour()->getId(),'niveaux' => $result['niveaux']]);
        }
    }
}
