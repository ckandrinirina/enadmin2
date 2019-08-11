<?php

namespace App\Controller;

use App\Entity\EC;
use App\Entity\Enseignant;
use App\Entity\RepartitionEC;
use App\Entity\UC;
use App\Form\EcType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\TypeParcours;
use App\Entity\Niveaux;
use App\Service\FileUploader;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class ECController extends AbstractController
{
    /**
     * @Route("/e/c", name="e_c")
     */
    public function index()
    {
        $status = "listeEc";

        $em = $this->getDoctrine()->getManager();
        $enseignantRepository = $em->getRepository(Enseignant::class);

        $enseignants = $enseignantRepository->findAll();
        /*        $number = $enseignantRepository->countAll();*/

        return $this->render('ec/liste.html.twig', [
            'status' => $status,
            'enseignants' => $enseignants,
        ]);
    }

    /**
     * @Route("/e/c/repartition/{type}/{niveaux}", name="repartitionEC")
     */
    public function repartition($type, $niveaux)
    {
        $status = "listeRep";

        $em = $this->getDoctrine()->getManager();
        $typeParcoursRepository = $em->getRepository(TypeParcours::class);
        $niveauxRepository = $em->getRepository(Niveaux::class);
        $repartitionEcRepository = $em->getRepository(RepartitionEC::class);

        $parcours = $typeParcoursRepository->find($type);
        $niv = $niveauxRepository->findByType($type);
        $repartition = $repartitionEcRepository->findByNiveaux($niveaux);

        return $this->render('ec/repartition.html.twig', [
            'parcour' => $parcours,
            'niveaux' => $niv,
            'status' => $status,
            'repartition' => $repartition,
            'n' => $niveaux
        ]);
    }

    /**
     * @Route("/e/c/u/c", name="e_c_u_c")
     */
    public function repartitionEcUc()
    {
        $status = "repEcUc";

        $em = $this->getDoctrine()->getManager();
        $UCRepository = $em->getRepository(UC::class);

        $UC = $UCRepository->findAll();

        return $this->render('ec/repartitionEcUc.html.twig', [
            'status' => $status,
            'UC' => $UC
        ]);
    }
    /**
     * @Route("e/c/ajoute" , name="add_ec")
     * 
     *  Require ROLE_ADMIN for only this controller method.
     * 
     *  @IsGranted("ROLE_ADMIN")
     * 
     */
    public function addEc(Request $request)
    {
        $status = "add_ec";
        $em = $this->getDoctrine()->getManager();
        $ec = new EC();
        // $repEc1 = new RepartitionEC();
        // $repEc2 = new RepartitionEC();

        $form = $this->createForm(EcType::class, $ec);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $typeRep = $em->getRepository(TypeParcours::class);
            $type = $typeRep->findAll();

            $t = $type['0']->getId();

            $niveaux = $ec->getUC()->getNiveaux();
            $semestres = $ec->getUC()->getSemestres();

            $uc = $ec->getUC();
            $all_ec = $uc->getECs();
            //set coeff and credit as somme of all coeff + new coeff and credit
            $coeff = 0;
            $credit = 0;
            foreach($all_ec as $single_ec)
            {
                $coeff = $coeff + $single_ec->getCoefficient();
                $credit = $credit + $single_ec->getCredit();
            }
            $coeff = $coeff + $ec->getCoefficient();
            $credit = $credit + $ec->getCredit();

            $uc->setCoefficient($coeff);
            $uc->setCredit($credit);

            // $nbr = 1;
            // foreach ($all_ec as $ec_count) {
            //     $nbr = $nbr + 1;
            // }
            // $coeff = 1 / $nbr;

            // foreach ($all_ec as $ec_count) {
            //     $ec_count->setCoefficient($coeff);
            //     $em->persist($ec_count);
            // }

            // $ec->setCoefficient($coeff);

            $i = 0;
            foreach ($niveaux as $niveau) {
                $repEc[$i] = new RepartitionEC();
                $repEc[$i]->setEc($ec);
                $repEc[$i]->setNiveaux($niveau);
                $repEc[$i]->setSemestre($semestres[$i]);
                $em->persist($repEc[$i]);
                $i = $i + 1;
            }
            $em->persist($uc);
            $em->persist($ec);

            $em->flush();
            return $this->redirectToRoute('repartition_uc_by_niveau', ['type' => $t, 'niveau' => $niveaux['0']->getId()]);
        }
        return $this->render(
            'ec/ajoute.html.twig',
            [
                'form' => $form->createView(),
                'status' => $status
            ]
        );
    }

    /**
     * @Route("e/c/ajoute/{id}" , name="ec_edit")
     * 
     *  Require ROLE_ADMIN for only this controller method.
     * 
     *  @IsGranted("ROLE_ADMIN")
     * 
     */
    public function editEc(Request $request, EC $ec)
    {
        $status = "add_ec";
        $em = $this->getDoctrine()->getManager();
        $repartition_ec_repository = $em->getRepository(RepartitionEC::class);
        $ec_repository = $em->getRepository(EC::class);
        // $repEc1 = new RepartitionEC();
        // $repEc2 = new RepartitionEC();

        $form = $this->createForm(EcType::class, $ec);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $typeRep = $em->getRepository(TypeParcours::class);
            $type = $typeRep->findAll();

            $t = $type['0']->getId();

            $niveaux = $ec->getUC()->getNiveaux();

            $uc = $ec->getUC();
            $all_ec = $uc->getECs();
            //set coeff and credit as somme of all coeff + new coeff and credit
            $coeff = 0;
            $credit = 0;
            foreach($all_ec as $single_ec)
            {
                $coeff = $coeff + $single_ec->getCoefficient();
                $credit = $credit + $single_ec->getCredit();
            }
            $last_ec = $ec_repository->find($ec->getId());
            $coeff = $coeff - $last_ec->getCoefficient();
            $credit = $credit - $last_ec->getCredit();
            $coeff = $coeff + $ec->getCoefficient();
            $credit = $credit + $ec->getCredit();

            // $semestres = $ec->getUC()->getSemestres();

            // $uc = $ec->getUC();
            // $all_ec = $uc->getECs();

            // $nbr = 1;
            // foreach ($all_ec as $ec_count) {
            //     $nbr = $nbr + 1;
            // }
            // $coeff = 1 / $nbr;

            // foreach ($all_ec as $ec_count) {
            //     $ec_count->setCoefficient($coeff);
            //     $em->persist($ec_count);
            // }

            // $ec->setCoefficient($coeff);

            // $i = 0;
            // foreach ($niveaux as $niveau) {
            //     $repEc[$i] = $repartition_ec_repository->find_by_s_n_ec($semestres[$i]->getId(), $niveau->getId(), $ec->getId());
            //     $repEc[$i] = $repEc[$i][0];
            //     $repEc[$i]->setEc($ec);
            //     $repEc[$i]->setNiveaux($niveau);
            //     $repEc[$i]->setSemestre($semestres[$i]);
            //     $em->persist($repEc[$i]);
            //     $i = $i + 1;
            // }
            $uc->setCoefficient($coeff);
            $uc->setCredit($credit);
            
            $em->persist($uc);
            $em->persist($ec);

            $em->flush();
            return $this->redirectToRoute('repartition_uc_by_niveau', ['type' => $t, 'niveau' => $niveaux['0']->getId()]);
        }
        return $this->render(
            'ec/ajoute.html.twig',
            [
                'form' => $form->createView(),
                'status' => $status
            ]
        );
    }
}
