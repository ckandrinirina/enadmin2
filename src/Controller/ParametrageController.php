<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\SalleClass;
use App\Form\SalleClasseType;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\AnneUniversitaire;
use App\Entity\Heures;
use App\Form\HeuresType;
use App\Form\ParametrageType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use App\Entity\Parametrage;
use App\Entity\Enseignant;

class ParametrageController extends AbstractController
{
    /**
     * @Route("/parametrage", name="parametrage")
     * 
     * Require ROLE_SUPER_ADMIN for only this controller method.
     * 
     *  @IsGranted("ROLE_SUPER_ADMIN")
     */
    public function index()
    {
        $status = 'param';
        $em = $this->getDoctrine()->getManager();
        $salles_repository = $em->getRepository(SalleClass::class);
        $anne_universitaire_repository = $em->getRepository(AnneUniversitaire::class);
        $heures_repository = $em->getRepository(Heures::class);

        $salles = $salles_repository->findAll();
        $heures = $heures_repository->findAll();

        $form_chef = $this->createForm(ParametrageType::class);
        $form_new = $this->createForm(SalleClasseType::class);
        $form_new_heures = $this->createForm(HeuresType::class);

        $latest_au = $anne_universitaire_repository->findAllByOrderLimit();
        $chef_mention_repository = $em->getRepository(Parametrage::class);
        $chef_mention = $chef_mention_repository->find('1');

        if ($salles != null) {
            foreach ($salles as $s) {
                $form[$s->getId()] = $this->createForm(SalleClasseType::class);
                $view_form[$s->getId()] = $form[$s->getId()]->createView();
            }
        } else {
            $view_form = null;
        }
        
        if ($heures != null) {
            foreach ($heures as $h) {
                $formH[$h->getId()] = $this->createForm(HeuresType::class);
                $view_form_heures[$h->getId()] = $formH[$h->getId()]->createView();
            }
        } else {
            $view_form_heures = null;
        }

        return $this->render('parametrage/index.html.twig', [
            'status' => $status,
            'salles' => $salles,
            'view_form' => $view_form,
            'form_new' => $form_new->createView(),
            'latest_au' => $latest_au,
            'view_form_heures' => $view_form_heures,
            'heures' => $heures,
            'formH' => $formH,
            'form_new_heures' => $form_new_heures->createView(),
            'form_chef' => $form_chef->createView(),
            'chef_mention' => $chef_mention
        ]);
    }

    /**
     * @Route("/delete-salle/{id}", name="delete-salle")
     * 
     * Require ROLE_SUPER_ADMIN for only this controller method.
     * 
     *  @IsGranted("ROLE_SUPER_ADMIN")
     */
    public function delete_salle(SalleClass $salle)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($salle);
        $em->flush();
        return $this->redirectToRoute('parametrage');
    }

    /**
     * @Route("/edit-salle/{id}", name="edit-salle")
     * 
     * Require ROLE_SUPER_ADMIN for only this controller method.
     * 
     *  @IsGranted("ROLE_SUPER_ADMIN")
     */
    public function edit_salle(SalleClass $salle, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $result = $request->request->all();
        $result = $result['salle_classe'];
        if ($result['_token']) {
            $em = $this->getDoctrine()->getManager();
            $salle->setNom($result['nom']);
            $em->persist($salle);
            $em->flush();
            return $this->redirectToRoute('parametrage');
        }
    }

    /**
     * @Route("/new-salle", name="new-salle")
     * 
     * Require ROLE_SUPER_ADMIN for only this controller method.
     * 
     *  @IsGranted("ROLE_SUPER_ADMIN")
     */
    public function new_salle(Request $request)
    {
        $salle = new SalleClass();
        $em = $this->getDoctrine()->getManager();
        $result = $request->request->all();
        $result = $result['salle_classe'];
        if ($result['_token']) {
            $em = $this->getDoctrine()->getManager();
            $salle->setNom($result['nom']);
            $em->persist($salle);
            $em->flush();
            return $this->redirectToRoute('parametrage');
        }
    }

    /**
     * @Route("/edit-heure/{id}", name="edit-heure")
     * 
     * Require ROLE_SUPER_ADMIN for only this controller method.
     * 
     *  @IsGranted("ROLE_SUPER_ADMIN")
     */
    public function edit_heure(Heures $heure, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $result = $request->request->all();
        $result = $result['heures'];
        if ($result['_token']) {
            $em = $this->getDoctrine()->getManager();
            $heure->setHeures($result['heures']);
            $em->persist($heure);
            $em->flush();
            return $this->redirectToRoute('parametrage');
        }
    }

    /**
     * @Route("/change_chef/{id}", name="change_chef")
     * 
     * Require ROLE_SUPER_ADMIN for only this controller method.
     * 
     *  @IsGranted("ROLE_SUPER_ADMIN")
     */
    public function change_chef(Parametrage $parametrage, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $enseignant_repository = $em->getRepository(Enseignant::class);
        $result = $request->request->all();
        $result = $result['parametrage'];
        if ($result['_token']) {
            $em = $this->getDoctrine()->getManager();
            $enseignant = $enseignant_repository->find($result['chefmention']);
            $parametrage->setChefmention($enseignant);
            $em->persist($parametrage);
            $em->flush();
            return $this->redirectToRoute('parametrage');
        }
    }

    /**
     * @Route("/new-heure", name="new-heure")
     * 
     * Require ROLE_SUPER_ADMIN for only this controller method.
     * 
     *  @IsGranted("ROLE_SUPER_ADMIN")
     */
    public function new_heure(Request $request)
    {
        $heure = new Heures();
        $em = $this->getDoctrine()->getManager();
        $result = $request->request->all();
        $result = $result['heures'];
        if ($result['_token']) {
            $em = $this->getDoctrine()->getManager();
            $heure->setNom($result['heures']);
            $em->persist($heure);
            $em->flush();
            return $this->redirectToRoute('parametrage');
        }
    }

    /**
     * @Route("/new-au", name="add-au")
     * 
     * Require ROLE_SUPER_ADMIN for only this controller method.
     * 
     *  @IsGranted("ROLE_SUPER_ADMIN")
     */
    public function add_au(Request $request)
    {
        $au = new AnneUniversitaire();
        $em = $this->getDoctrine()->getManager();
        $au_repository = $em->getRepository(AnneUniversitaire::class);
        $last_au = $au_repository->findLatestAu();
        $last_au_value = explode('/', $last_au['0']->getAnneUniversitaire());
        $new_au_value = ($last_au_value['0'] + 1);
        $new_au_value2 = ($last_au_value['1'] + 1);
        $final_new_value = $new_au_value . '/' . $new_au_value2;
        $au->setAnneUniversitaire($final_new_value);
        $em->persist($au);
        $em->flush($au);
        return $this->redirectToRoute('parametrage');
    }
}
