<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\RechercheType;
use Symfony\Component\HttpFoundation\Request;

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
        $form = $this->createForm(RechercheType::class);
        $form->handleRequest($request);
        $result = $request->request->all();
        $result = $result['recherche'];
        if ($result['_token']) {
            dump($result);
        }
        return $this->render('search/index.html.twig', [
            'form' => 'ok'
        ]);
    }
}
