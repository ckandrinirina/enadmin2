<?php

namespace App\Controller;

use App\Entity\EC;
use App\Entity\RepartitionEC;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UtilityController extends AbstractController
{
    /**
     * @Route("/utility", name="utility")
     */
    public function index()
    {
        $em = $this->getDoctrine()->getManager();

        $repartition_ec_repository = $em->getRepository(RepartitionEC::class);
        $ec_repository = $em->getRepository(EC::class);
        
        $repartition_ec = $repartition_ec_repository->findAll();
        foreach($repartition_ec as $rep)
        {
            $ec = $ec_repository->find($rep->getEc()->getId());
            $ec->addNiveau($rep->getNiveaux());
            $ec->addSemestre($rep->getSemestre());
            $em->persist($ec);
        }
        $em->flush();
        return $this->render('utility/index.html.twig');
    }
}
