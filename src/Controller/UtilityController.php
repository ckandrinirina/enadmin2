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
        $ec_rep = $em->getRepository(EC::class);
        $ec = $ec_rep->findAll();
        foreach($ec as $rep)
        {
            $rep->setIsActive(1);
            $em->persist($rep);
        }
        $em->flush();
        return $this->render('utility/index.html.twig');
    }
}
