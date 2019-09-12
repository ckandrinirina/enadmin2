<?php

namespace App\Controller;

use App\Entity\School;
use App\Form\SchoolType;
use App\Repository\SchoolRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * @Route("/school")
 */
class SchoolController extends AbstractController
{
    /**
     * @Route("/", name="school_index", methods={"GET"})
     * Vous n'avez pas le permission de voir cette page.
     *
     * @IsGranted("ROLE_USER")
     */
    public function index(SchoolRepository $schoolRepository): Response
    {
        $status = 'accueil';
        return $this->render('school/index.html.twig', [
            'schools' => $schoolRepository->findAll(),
            'status' => $status
        ]);
    }

    /**
     * @Route("/new", name="school_new", methods={"GET","POST"})
     * Vous n'avez pas le permission de voir cette page.
     *
     * @IsGranted("ROLE_USER")
     */
    public function new(Request $request): Response
    {
        $status = 'accueil';
        $school = new School();
        $form = $this->createForm(SchoolType::class, $school);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($school);
            $entityManager->flush();

            return $this->redirectToRoute('school_index');
        }

        return $this->render('school/new.html.twig', [
            'school' => $school,
            'form' => $form->createView(),
            'status' => $status
        ]);
    }

    /**
     * @Route("show/{id}", name="school_show", methods={"GET"})
     * Vous n'avez pas le permission de voir cette page.
     *
     * @IsGranted("ROLE_USER")
     */
    public function show(School $school): Response
    {
        $status = 'accueil';
        return $this->render('school/show.html.twig', [
            'school' => $school,
            'status' => $status
        ]);
    }

    /**
     * @Route("/{id}/edit", name="school_edit", methods={"GET","POST"})
     * Vous n'avez pas le permission de voir cette page.
     *
     * @IsGranted("ROLE_USER")
     */
    public function edit(Request $request, School $school): Response
    {
        $status = 'accueil';
        $form = $this->createForm(SchoolType::class, $school);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('school_index', [
                'id' => $school->getId(),
            ]);
        }

        return $this->render('school/edit.html.twig', [
            'school' => $school,
            'form' => $form->createView(),
            'status' =>$status
        ]);
    }

    /**
     * @Route("/{id}", name="school_delete", methods={"DELETE"})
     * Vous n'avez pas le permission de voir cette page.
     *
     * @IsGranted("ROLE_USER")
     */
    public function delete(Request $request, School $school): Response
    {
        if ($this->isCsrfTokenValid('delete'.$school->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($school);
            $entityManager->flush();
        }

        return $this->redirectToRoute('school_index');
    }
}
