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
    public function index(Request $request)
    {
        $form = $this->createForm(RechercheType::class);
        $form->handleRequest($request);
        if($form->isSubmitted())
        {
            dump($form->getData());
        }
        return $this->render('search/index.html.twig',[
            'form'=>$form->createView()
        ]);
    }
}
