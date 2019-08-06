<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Etudiant;
use App\Entity\Enseignant;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\User;
use App\Form\RoleType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\JsonResponse;

class UserController extends AbstractController
{
    /**
     *  @Route("/user-etudiant", name="user_etudiant")
     *  Require ROLE_SUPER_ADMIN for only this controller method.
     * 
     *  @IsGranted("ROLE_SUPER_ADMIN")
     */
    public function index()
    {
        $status = "user";
        $em = $this->getDoctrine()->getManager();
        $etudiant_repository = $em->getRepository(Etudiant::class);
        $etudiant = $etudiant_repository->findAll();
        return $this->render('user/index.html.twig', [
            'status' => $status,
            'etudiant' => $etudiant
        ]);
    }

    /**
     * @Route("/user-enseignant", name="user_enseignant")
     * 
     * Require ROLE_SUPER_ADMIN for only this controller method.
     * 
     *  @IsGranted("ROLE_SUPER_ADMIN")
     */
    public function enseignant()
    {
        $status = "user";
        $em = $this->getDoctrine()->getManager();
        $enseignant_repository = $em->getRepository(Enseignant::class);
        $enseignant = $enseignant_repository->findAll();
        $i = 0;
        foreach ($enseignant as $e) {
            $form[$i] = $this->createForm(RoleType::class);
            $view_form[$i] = $form[$i]->createView();
            $i++;
        }

        return $this->render('user/enseignant.html.twig', [
            'status' => $status,
            'enseignant' => $enseignant,
            'view_form' => $view_form
        ]);
    }

    /**
     * @Route("/change-role/{id}", name="change_role")
     * 
     * Require ROLE_SUPER_ADMIN for only this controller method.
     * 
     *  @IsGranted("ROLE_SUPER_ADMIN")
     */
    public function change_role(User $user, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $result = $request->request->all();
        $result = $result['role'];
        if ($result['_token']) {
            $array_roles[] = $result['roles'];
            $user->setRoles($array_roles);
            $em->persist($user);
            $em->flush();
            return $this->redirectToRoute('user_enseignant');
        }
    }

    /**
     * @Route("/user-admin", name="user_admin")
     * 
     * Require ROLE_SUPER_ADMIN for only this controller method.
     * 
     *  @IsGranted("ROLE_SUPER_ADMIN")
     */
    public function administrateur(Request $request)
    {
        $status = "user";
        return $this->render('user/admin.html.twig', [
            'status' => $status
        ]);
    }

    /**
     * @Route("/ajax-change-role/{id}", name="ajax_change_role" , options = { "expose" = true })
     * 
     * Require ROLE_SUPER_ADMIN for only this controller method.
     * 
     *  @IsGranted("ROLE_SUPER_ADMIN")
     */
    public function ajax_change_role(User $user ,Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        if($user->getIsActive() == 1)
            $user->setIsActive(false);
        else
            $user->setIsActive(true);
        $em->persist($user);
        $em->flush();
        $response = new JsonResponse();
        return $response;
    }
}
