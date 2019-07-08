<?php

namespace App\Controller;

use App\Entity\UC;
use App\Form\UCType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\TypeParcours;
use App\Entity\Niveaux;
use App\Entity\Semestre;

class UCController extends AbstractController
{
    /**
     * @Route("/u/c/ajoute", name="add_u_c")
     */
    public function index(Request $request)
    {
        $status = 'addUc';

        $UC = new UC();
        $form = $this->createForm(UCType::class, $UC);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $typeRep = $em->getRepository(TypeParcours::class);
            $type = $typeRep->findAll();
            $t = $type['0']->getId();

            foreach($UC->getNiveaux() as $value)
            {
                $niveaux[]=$value['niveaux'];
                $semestre[]=$value['semestre'];
            }
            $UC2 = new UC();
            foreach($niveaux as $niveau)
            {
                $UC2->addNiveau($niveau);
            }
            foreach($semestre as $sem )
            {
                $UC2->addSemestre($sem);
            }
            $UC2->setCoefficient($UC->getCoefficient());
            $UC2->setCredit($UC->getCredit());
            $UC2->setNom($UC->getNom());
             
            $em->persist($UC2);
            $em->flush();
            return $this->redirectToRoute('repartition_uc_by_niveau',['type'=>$t,'niveau'=>$niveaux['0']->getId()]);
        }

        return $this->render('uc/index.html.twig', ['status' => $status, 'form' => $form->createView()]);
    }

    /**
     * @Route("u/c/list" , name="ucList")
     */
    public function list()
    {
        $status = 'UCEC';
        $em = $this->getDoctrine()->getManager();
        $ucRepository = $em->getRepository(UC::class);
        $uc = $ucRepository->findAllCustom();

        return $this->render('uc/list.html.twig', ['status' => $status, 'uc' => $uc]);
    }

    /**
     * @Route("uc/rep/list/{type}/{niveau}" , name="repartition_uc_by_niveau")
     */
    public function repartition_uc_by_niveau($type, $niveau)
    {
        $status = 'r_u_b_n';
        $em = $this->getDoctrine()->getManager();
        $typeParcoursRepository = $em->getRepository(TypeParcours::class);
        $niveauxRepository = $em->getRepository(Niveaux::class);
        $semestreRepository = $em->getRepository(Semestre::class);

        $parcours = $typeParcoursRepository->find($type);
        $niv = $niveauxRepository->findByType($type);
        $semestre = $semestreRepository->findSemestreByNiveaux($niveau);
        
        return $this->render('uc/repartition_uc_by_niveau.html.twig', [
            'status' => $status,
            'parcour' => $parcours,
            'niveaux' => $niv,
            'n' => $niveau,
            'semestre' => $semestre
        ]);
    }
    /**
     * @Route("uc/rep/list/pdf/{type}/{niveau}" , name="repartition_uc_by_niveau_pdf")
     */
    public function repartition_uc_by_niveau_pdf($type, $niveau)
    {
        $status = 'r_u_b_n';
        $em = $this->getDoctrine()->getManager();
        $typeParcoursRepository = $em->getRepository(TypeParcours::class);
        $niveauxRepository = $em->getRepository(Niveaux::class);
        $semestreRepository = $em->getRepository(Semestre::class);

        $niv_name = $niveauxRepository->find($niveau);
        $parcours = $typeParcoursRepository->find($type);
        $niv = $niveauxRepository->findByType($type);
        $semestre = $semestreRepository->findSemestreByNiveaux($niveau);
        
        return $this->render('uc/repartition_uc_by_niveau_pdf.html.twig', [
            'status' => $status,
            'parcour' => $parcours,
            'niveaux' => $niv,
            'n' => $niveau,
            'semestre' => $semestre,
            'niv_name' =>$niv_name
        ]);
    }
}
