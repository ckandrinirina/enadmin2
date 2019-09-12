<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\RechercheType;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Etudiant;
use App\Entity\Enseignant;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class SearchController extends AbstractController
{
    /**
     * @Route("/search", name="search")
     * Vous n'avez pas le permission de voir cette page.
     *
     * @IsGranted("ROLE_USER")
     */
    public function index()
    {
        $form = $this->createForm(RechercheType::class);
        return $this->render('search/index.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/search-result", name="search_result")
     * Vous n'avez pas le permission de voir cette page.
     *
     * @IsGranted("ROLE_USER")
     */
    public function result(Request $request) 
    {
        $em = $this->getDoctrine()->getManager();
        $etudiant_repository = $em->getRepository(Etudiant::class);
        $enseignant_repository = $em->getRepository(Enseignant::class);
        $status ="search";

        $form = $this->createForm(RechercheType::class);
        $form->handleRequest($request);
        $result = $request->request->all();
        $result = $result['recherche'];
        $search = $result['search'];

        $etudiants = $etudiant_repository->find_by_critere($search);
        $enseignants = $enseignant_repository->find_by_critere($search);

        return $this->render('search/result.html.twig', [
            'status' => $status,
            'etudiants' => $etudiants,
            'enseignants'=>$enseignants
        ]);
    }
}
