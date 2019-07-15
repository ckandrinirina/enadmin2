<?php

namespace App\Controller;

use App\Entity\Enseignant;
use App\Entity\EnseignantType;
use App\Form\EnseignantAddType;
use function Sodium\add;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SearchType;
use App\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\AnneUniversitaire;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class EnseignantController extends AbstractController
{
    /**
     * @Route("/enseignant/{type}", name="enseignant")
     * 
     * Require ROLE_ADMIN for only this controller method.
     * 
     *  @IsGranted("ROLE_ADMIN")
     */
    public function index($type)
    {
        $status = "listEns";
        $t = $type;

        $em = $this->getDoctrine()->getManager();
        $typeRepository = $em->getRepository(EnseignantType::class);
        $enseignantRepository = $em->getRepository(Enseignant::class);

        $type = $typeRepository->find($type);
        $enseignants = $enseignantRepository->findByType($type);

        return $this->render(
            'enseignant/list.html.twig',
            [
                'enseignants' => $enseignants,
                'status' => $status,
                'type' => $t
            ]
        );
    }

    /**
     * @Route("/enseignant/pdf/{type}", name="enseignant_pdf")
     */
    public function enseignant_pdf($type)
    {
        $status = "listEns";
        $t = $type;

        $em = $this->getDoctrine()->getManager();
        $typeRepository = $em->getRepository(EnseignantType::class);
        $enseignantRepository = $em->getRepository(Enseignant::class);
        $anneUnRep = $em->getRepository(AnneUniversitaire::class);
        $anneU = $anneUnRep->findLatestAu();
        $anne = $anneU['0']->getAnneUniversitaire();
        $type = $typeRepository->find($type);
        $enseignants = $enseignantRepository->findByType($type);

        return $this->render(
            'enseignant/list_pdf.html.twig',
            [
                'enseignants' => $enseignants,
                'status' => $status,
                'annee' => $anne,
                'type' => $t
            ]
        );
    }

    /**
     * @Route("enseignant-ajoute/{login}",name="enseignant_add",methods={"GET","POST"})
     */
    public function addEnseignant(Request $request, $login = NULL)
    {
        if ($login == NULL) {
            return $this->redirectToRoute('app_register');
        }
        $status = "addEns";
        $em = $this->getDoctrine()->getManager();
        $userRepository = $em->getRepository(User::class);
        $enseignantRepository = $em->getRepository(Enseignant::class);

        $ens = $enseignantRepository->findByLogin($login);

        if ($ens != NULL) {
            return $this->redirectToRoute('app_register');
        }

        $user = $userRepository->find($login);
        if (!(isset($user))) {
            return $this->redirectToRoute('app_register');
        }

        $enseignant = new Enseignant();
        $form = $this->createForm(EnseignantAddType::class, $enseignant);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $enseignant->setLogin($user);
            $em->persist($enseignant);
            $em->flush();

            return $this->redirectToRoute('enseignant');
        }

        return $this->render('enseignant/ajoute.html.twig', [
            'form' => $form->createView(),
            'status' => $status
        ]);
    }
}
