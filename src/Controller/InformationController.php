<?php

namespace App\Controller;

use App\Entity\Information;
use App\Form\InformationType;
use App\Repository\InformationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/information")
 */
class InformationController extends AbstractController
{
    /**
     * @Route("/", name="information_index", methods={"GET"})
     */
    public function index(InformationRepository $informationRepository): Response
    {
        $status = 'informations';
        return $this->render('information/index.html.twig', [
            'information' => $informationRepository->findAll(),
            'status' => $status
        ]);
    }

    /**
     * @Route("/new", name="information_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $status = 'informations';
        $information = new Information();
        $form = $this->createForm(InformationType::class, $information);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($information);
            $entityManager->flush();

            return $this->redirectToRoute('information_index');
        }

        return $this->render('information/new.html.twig', [
            'information' => $information,
            'form' => $form->createView(),
            'status' => $status
        ]);
    }

    /**
     * @Route("/{id}", name="information_show", methods={"GET"})
     */
    public function show(Information $information): Response
    {
        $status = 'informations';
        return $this->render('information/show.html.twig', [
            'information' => $information,
            'status' => $status
        ]);
    }

    /**
     * @Route("/{id}/edit", name="information_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Information $information): Response
    {
        $status = 'informations';
        $form = $this->createForm(InformationType::class, $information);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('information_index', [
                'id' => $information->getId(),
            ]);
        }

        return $this->render('information/edit.html.twig', [
            'information' => $information,
            'form' => $form->createView(),
            'status' => $status
        ]);
    }

    /**
     * @Route("/{id}", name="information_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Information $information): Response
    {
        if ($this->isCsrfTokenValid('delete'.$information->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($information);
            $entityManager->flush();
        }

        return $this->redirectToRoute('information_index');
    }
}
