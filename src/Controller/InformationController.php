<?php

namespace App\Controller;

use App\Entity\Information;
use App\Form\InformationType;
use App\Repository\InformationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\InformationChildrenType;
use App\Entity\InformationChild;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;


/**
 * @Route("/information")
 */
class InformationController extends AbstractController
{
    /**
     * @Route("/", name="information_index", methods={"GET"})
     * Vous n'avez pas le permission de voir cette page.
     *
     * @IsGranted("ROLE_USER")
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
     * Vous n'avez pas le permission de voir cette page.
     *
     * @IsGranted("ROLE_USER")
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
     * Vous n'avez pas le permission de voir cette page.
     *
     * @IsGranted("ROLE_USER")
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
     * Vous n'avez pas le permission de voir cette page.
     *
     * @IsGranted("ROLE_USER")
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
     * Vous n'avez pas le permission de voir cette page.
     *
     * @IsGranted("ROLE_USER")
     */
    public function delete(Request $request, Information $information): Response
    {
        if ($this->isCsrfTokenValid('delete' . $information->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($information);
            $entityManager->flush();
        }

        return $this->redirectToRoute('information_index');
    }

    /**
     * @Route("/information-list/{pagination}",name="list_all_info")
     * Vous n'avez pas le permission de voir cette page.
     *
     * @IsGranted("ROLE_USER")
     */
    public function information_list_all($pagination)
    {
        $status = 'information_list';
        $em = $this->getDoctrine()->getManager();
        $information_repository = $em->getRepository(Information::class);

        if ($this->getUser()->getEtudiant() == null)
            $last_information = $information_repository->findLastInformationWithPagination($pagination);
        else
            $last_information = $information_repository->findLastInformationByNiveauxWithPagination($this->getUser()->getEtudiant()->getNiveaux()->getId(), $pagination);

        $information_form = $this->createForm(InformationType::class);
        $information_form_view = $information_form->createView();

        $count = count($information_repository->findAll());
        $count = (int)($count/5);

        if ($last_information != null) {
            foreach ($last_information as $l) {
                $form_child[$l->getId()] = $this->createForm(InformationChildrenType::class);
                $informationChildren_form_view[$l->getId()] = $form_child[$l->getId()]->createView();
            }
        } else {
            $informationChildren_form_view = null;
        }

        return $this->render('information/list_all.html.twig', [
            'status' => $status,
            'last_information' => $last_information,
            'information_form_view' => $information_form_view,
            'informationChildren_form_view' => $informationChildren_form_view,
            'count' => $count,
            'pagination' => $pagination
        ]);
    }
}
