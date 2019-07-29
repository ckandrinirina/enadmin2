<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Etudiant;
use Proxies\__CG__\App\Entity\Enseignant;

class UserController extends AbstractController
{
    /**
     * @Route("/user-etudiant", name="user_etudiant")
     */
    public function index()
    {
        $status="user";
        $em = $this->getDoctrine()->getManager();
        $etudiant_repository = $em->getRepository(Etudiant::class);
        $etudiant = $etudiant_repository->findAll();
        return $this->render('user/index.html.twig',[
            'status'=>$status,
            'etudiant'=>$etudiant
        ]);
    }

    /**
     * @Route("/user-enseignant", name="user_enseignant")
     */
    public function enseignant()
    {
        $status="user";
        $em = $this->getDoctrine()->getManager();
        $enseignant_repository = $em->getRepository(Enseignant::class);
        $enseignant = $enseignant_repository->findAll();
        return $this->render('user/enseignant.html.twig',[
            'status'=> $status,
            'enseignant' => $enseignant
        ]);
    }

    /**
     * @Route("/user-admin", name="user_admin")
     */
    public function administrateur()
    {
        $status="user";
        return $this->render('user/index.html.twig',[
            'status'=>$status
        ]);
    }
}
