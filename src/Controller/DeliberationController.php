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

class DeliberationController extends AbstractController
{
    /**
     * @Route("/deliberation-final/{type}/{niveaux}", name="deliberation_final")
     * 
     * Require ROLE_SUPER_ADMIN for only this controller method.
     * 
     *  @IsGranted("ROLE_SUPER_ADMIN")
     */
    public function index($type, $niveaux)
    {
        $status = 'deliberation';

        $em = $this->getDoctrine()->getManager();

        $typeParcoursRepository = $em->getRepository(TypeParcours::class);
        $niveauxRepository = $em->getRepository(Niveaux::class);
        $etudiantRepository = $em->getRepository(Etudiant::class);

        $parcours = $typeParcoursRepository->find($type);
        $niv = $niveauxRepository->findByType($type);
        $niveaux_form = $niveauxRepository->find($niveaux);
        $etudiants = $etudiantRepository->findByNiveaux($niveaux);

        if ($etudiants != null) {
            foreach ($etudiants as $e) {
                $form[$e->getId()] = $this->createForm(NiveauxChoiceType::class);
                $view_form[$e->getId()] = $form[$e->getId()]->createView();
            }
        } else {
            $view_form = null;
        }

        return $this->render('deliberation/index.html.twig', [
            'parcour' => $parcours,
            'niveaux' => $niv,
            'status' => $status,
            'n' => $niveaux,
            'etudiants' => $etudiants,
            'view_form' => $view_form
        ]);
    }


    /**
     * @Route("/change-salle/{id}", name="admis")
     * 
     */
    public function change_niveaux(Etudiant $etudiant, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $result = $request->request->all();
        dump($result);
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
