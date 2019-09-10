<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\ParamGen;
use App\Entity\Enseignant;


class FrontController extends AbstractController
{
    /**
     * @Route("/", name="front")
     */
    public function index()
    {
      $em = $this->getDoctrine()->getManager();
      $param_gen_repository = $em->getRepository(ParamGen::class);
      $enseignant_repository = $em->getRepository(Enseignant::class);

      $second_tranche = $param_gen_repository->findBy(['table_name'=>'second_tranche']);
      $description = $param_gen_repository->findBy(['table_name'=>'description_electronique']);
      $offre = $param_gen_repository->findBy(['table_name'=>'offre']);
      $droit = $param_gen_repository->findBy(['table_name'=>'droit']);

      $enseignants = $enseignant_repository->find_vacataire();

      return $this->render('front/index.html.twig',[
        'second_tranche'=> $second_tranche,
        'description' =>$description,
        'offre'=>$offre,
        'droit'=>$droit,
        'enseignants'=>$enseignants
      ]);
    }
}
