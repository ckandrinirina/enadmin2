<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Security\LoginFormAuthentificator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Guard\GuardAuthenticatorHandler;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use App\Form\RegistrationEditType;

class RegistrationController extends AbstractController
{
    /**
     * @Route("/register/{test}", name="app_register")
     * 
     * Require ROLE_ADMIN for only this controller method.
     * 
     *  @IsGranted("ROLE_ADMIN")
     */
    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder, GuardAuthenticatorHandler $guardHandler, LoginFormAuthentificator $authenticator, $test = null): Response
    {
        $status = "register";
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
                $passwordEncoder->encodePassword(
                    $user,
                    $form->get('password')->getData()
                )
            );

            if ($user->getType()->getType() == 'étudiant') {
                $roles[] = 'ROLE_USER';
                $user->setRoles($roles);
            } elseif ($user->getType()->getType() == 'enseignant') {
                $roles[] = 'ROLE_ADMIN';
                $user->setRoles($roles);
            } elseif ($user->getType()->getType() == 'administrateur') {
                $roles[] = 'ROLE_SUPER_ADMIN';
                $user->setRoles($roles);
            }

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            if ($user->getType()->getType() == 'étudiant')
                return $this->redirectToRoute('etudiant_add', ['login' => $user->getId()]);

            if ($user->getType()->getType() == 'enseignant')
                return $this->redirectToRoute('enseignant_add', ['login' => $user->getId()]);
            if ($user->getType()->getType() == 'administrateur')
                return $this->redirectToRoute('accueil');
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
            'status' => $status,
            'test' => $test
        ]);
    }
     /**
     * @Route("/edit-acces/{id}", name="app_edit_acces")
     */
    public function edit_acces(Request $request, UserPasswordEncoderInterface $passwordEncoder, GuardAuthenticatorHandler $guardHandler, LoginFormAuthentificator $authenticator,User $user): Response
    {
        $status = "register";
        $form = $this->createForm(RegistrationEditType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
                $passwordEncoder->encodePassword(
                    $user,
                    $form->get('password')->getData()
                )
            );

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

        return $this->redirectToRoute('etudiant_profile',[
            'etudiant'=> $this->getUser()->getEtudiant()->getId()
        ]);
        }

        return $this->render('registration/register_edit.html.twig', [
            'registrationForm' => $form->createView(),
            'status' => $status,
        ]);
    }
}
