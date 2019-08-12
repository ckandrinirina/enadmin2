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
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class UCController extends AbstractController
{
    /**
     * @Route("/u/c/ajoute", name="add_u_c")
     * 
     * Require ROLE_ADMIN for only this controller method.
     * 
     *  @IsGranted("ROLE_ADMIN")
     */
    public function index(Request $request)
    {
        $status = 'addUc';

        $uc = new UC();
        $form = $this->createForm(UCType::class, $uc);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $typeRep = $em->getRepository(TypeParcours::class);
            $type = $typeRep->findAll();
            $t = $type['0']->getId();
            $uc2 = new UC();
            foreach($uc->getNiveaux() as $value)
            {
                $niveaux[]=$value['niveaux'];
                $semestre[]=$value['semestre'];
            }
            $uc2 = new UC();
            foreach($niveaux as $niveau)
            {
                $uc2->addNiveau($niveau);
            }
            foreach($semestre as $sem )
            {
                $uc2->addSemestre($sem);
            }
            $uc2->setCoefficient($uc->getCoefficient());
            $uc2->setCredit($uc->getCredit());
            $uc2->setNom($uc->getNom());
            $em->persist($uc2);
            $em->flush();
            return $this->redirectToRoute('repartition_uc_by_niveau',['type'=>$t,'niveau'=>$niveaux['0']->getId()]);
        }

        return $this->render('uc/index.html.twig', ['status' => $status, 'form' => $form->createView()]);
    }

    /**
     * @Route("/u/c/edit/{id}", name="ue_edit")
     * 
     * Require ROLE_ADMIN for only this controller method.
     * 
     *  @IsGranted("ROLE_ADMIN")
     */
    public function edit_ue(Request $request,UC $uc)
    {
        $status = 'addUc';
        $form = $this->createForm(UCType::class, $uc);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $typeRep = $em->getRepository(TypeParcours::class);
            $type = $typeRep->findAll();
            $t = $type['0']->getId();

            // foreach($uc->getNiveaux() as $value)
            // {
            //     $niveaux[]=$value['niveaux'];
            //     $semestre[]=$value['semestre'];
            // }
            // $uc2 = new UC();
            // foreach($niveaux as $niveau)
            // {
            //     $uc2->addNiveau($niveau);
            // }
            // foreach($semestre as $sem )
            // {
            //     $uc2->addSemestre($sem);
            // }
            // $uc2->setCoefficient($uc->getCoefficient());
            // $uc2->setCredit($uc->getCredit());
            // $uc2->setNom($uc->getNom());
             
            $em->persist($uc);
            $em->flush();
            return $this->redirectToRoute('repartition_uc_by_niveau',['type'=>$t,'niveau'=>$uc->getNiveaux()['0']->getId()]);
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
     * @Route("uc/rep/list-edit/{type}/{niveau}" , name="repartition_uc_by_niveau_edit")
     */
    public function repartition_uc_by_niveau_edit($type, $niveau)
    {
        $status = 'r_u_b_n';
        $em = $this->getDoctrine()->getManager();
        $typeParcoursRepository = $em->getRepository(TypeParcours::class);
        $niveauxRepository = $em->getRepository(Niveaux::class);
        $semestreRepository = $em->getRepository(Semestre::class);

        $parcours = $typeParcoursRepository->find($type);
        $niv = $niveauxRepository->findByType($type);
        $semestre = $semestreRepository->findSemestreByNiveaux($niveau);
        
        return $this->render('uc/repartition_uc_by_niveau_edit.html.twig', [
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
