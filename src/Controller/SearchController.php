<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\RechercheType;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Etudiant;

class SearchController extends AbstractController
{
    /**
     * @Route("/search", name="search")
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
     */
    public function result(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $etudiant_repository = $em->getRepository(Etudiant::class);
        $status ="search";
        $form = $this->createForm(RechercheType::class);
        $form->handleRequest($request);
        $result = $request->request->all();
        $result = $result['recherche'];
        $search = $result['search'];

        $etudiants = $etudiant_repository->find_by_critere($search);
        dump($etudiants);die();

        return $this->render('search/result.html.twig', [
            'status' => $status
        ]);
    }
}
