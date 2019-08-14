<?php

namespace App\DataFixtures;

use App\Entity\Etudiant;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class EtudiantsFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $etudiant1 = new Etudiant();
        $etudiant1->setNom('Nom_etudiant1');
        $etudiant1->setPrenom('prenom_etudiant1');
        $etudiant1->setPhoto('photo_etudiant1');
        $etudiant1->setPere('pere_etudiant1');
        $etudiant1->setMere('mere_etudiant1');
        $etudiant1->setProfessionPere('profession_pere_etudiant1');
        $etudiant1->setProfessionMere('profession_mere_etudiant1');
        $etudiant1->setContact('contact_etudiant1');
        $etudiant1->setDateNaissance(new \DateTime());
        $etudiant1->setLieuxNaissance('LieuxNaissance_etudiant1');
        $etudiant1->setAdresse('adresse_etudiant1');
        $etudiant1->setAnneEntre('2013');
        $etudiant1->setSexe($this->getReference('homme'));
        $etudiant1->setNiveaux($this->getReference('L1'));
        $etudiant1->setParcour($this->getReference('academique'));
        $etudiant1->setAnneUniversitaire($this->getReference('2018/2019'));
        $manager->persist($etudiant1);

        $etudiant2 = new Etudiant();
        $etudiant2->setNom('A_Nom_etudiant2');
        $etudiant2->setPrenom('prenom_etudiant2');
        $etudiant2->setPhoto('photo_etudiant2');
        $etudiant2->setPere('pere_etudiant2');
        $etudiant2->setMere('mere_etudiant2');
        $etudiant2->setProfessionPere('profession_pere_etudiant2');
        $etudiant2->setProfessionMere('profession_mere_etudiant2');
        $etudiant2->setContact('contact_etudiant2');
        $etudiant2->setDateNaissance(new \DateTime());
        $etudiant2->setLieuxNaissance('LieuxNaissance_etudiant2');
        $etudiant2->setAdresse('adresse_etudiant1');
        $etudiant2->setAnneEntre('2013');
        $etudiant2->setSexe($this->getReference('femme'));
        $etudiant2->setNiveaux($this->getReference('L1'));
        $etudiant2->setParcour($this->getReference('academique'));
        $etudiant2->setAnneUniversitaire($this->getReference('2018/2019'));
        $manager->persist($etudiant2);

        $etudiant3 = new Etudiant();
        $etudiant3->setNom('Nom_etudiant3');
        $etudiant3->setPrenom('prenom_etudiant3');
        $etudiant3->setPhoto('photo_etudiant3');
        $etudiant3->setPere('pere_etudiant3');
        $etudiant3->setMere('mere_etudiant3');
        $etudiant3->setProfessionPere('profession_pere_etudiant3');
        $etudiant3->setProfessionMere('profession_mere_etudiant3');
        $etudiant3->setContact('contact_etudiant3');
        $etudiant3->setDateNaissance(new \DateTime());
        $etudiant3->setLieuxNaissance('LieuxNaissance_etudiant3');
        $etudiant3->setAdresse('adresse_etudiant3');
        $etudiant3->setAnneEntre('2013');
        $etudiant3->setSexe($this->getReference('homme'));
        $etudiant3->setNiveaux($this->getReference('L1'));
        $etudiant3->setParcour($this->getReference('academique'));
        $etudiant3->setAnneUniversitaire($this->getReference('2018/2019'));
        $manager->persist($etudiant3);

        $etudiant4 = new Etudiant();
        $etudiant4->setNom('Nom_etudiant4');
        $etudiant4->setPrenom('prenom_etudiant4');
        $etudiant4->setPhoto('photo_etudiant4');
        $etudiant4->setPere('pere_etudiant4');
        $etudiant4->setMere('mere_etudiant4');
        $etudiant4->setProfessionPere('profession_pere_etudiant4');
        $etudiant4->setProfessionMere('profession_mere_etudiant4');
        $etudiant4->setContact('contact_etudiant4');
        $etudiant4->setDateNaissance(new \DateTime());
        $etudiant4->setLieuxNaissance('LieuxNaissance_etudiant4');
        $etudiant4->setAdresse('adresse_etudiant4');
        $etudiant4->setAnneEntre('2013');
        $etudiant4->setSexe($this->getReference('homme'));
        $etudiant4->setNiveaux($this->getReference('L1'));
        $etudiant4->setParcour($this->getReference('professionel'));
        $etudiant4->setAnneUniversitaire($this->getReference('2018/2019'));
        $manager->persist($etudiant4);

        $etudiant5 = new Etudiant();
        $etudiant5->setNom('Nom_etudiant5');
        $etudiant5->setPrenom('prenom_etudiant5');
        $etudiant5->setPhoto('photo_etudiant5');
        $etudiant5->setPere('pere_etudiant5');
        $etudiant5->setMere('mere_etudiant5');
        $etudiant5->setProfessionPere('profession_pere_etudiant5');
        $etudiant5->setProfessionMere('profession_mere_etudiant5');
        $etudiant5->setContact('contact_etudiant5');
        $etudiant5->setDateNaissance(new \DateTime());
        $etudiant5->setLieuxNaissance('LieuxNaissance_etudiant5');
        $etudiant5->setAdresse('adresse_etudiant5');
        $etudiant5->setAnneEntre('2013');
        $etudiant5->setSexe($this->getReference('femme'));
        $etudiant5->setNiveaux($this->getReference('L1'));
        $etudiant5->setParcour($this->getReference('professionel'));
        $etudiant5->setAnneUniversitaire($this->getReference('2018/2019'));
        $manager->persist($etudiant5);

        $etudiant6 = new Etudiant();
        $etudiant6->setNom('Nom_etudiant6');
        $etudiant6->setPrenom('prenom_etudiant6');
        $etudiant6->setPhoto('photo_etudiant6');
        $etudiant6->setPere('pere_etudiant6');
        $etudiant6->setMere('mere_etudiant6');
        $etudiant6->setProfessionPere('profession_pere_etudiant6');
        $etudiant6->setProfessionMere('profession_mere_etudiant6');
        $etudiant6->setContact('contact_etudiant1');
        $etudiant6->setDateNaissance(new \DateTime());
        $etudiant6->setLieuxNaissance('LieuxNaissance_etudiant6');
        $etudiant6->setAdresse('adresse_etudiant6');
        $etudiant6->setAnneEntre('2013');
        $etudiant6->setSexe($this->getReference('homme'));
        $etudiant6->setNiveaux($this->getReference('L1'));
        $etudiant6->setParcour($this->getReference('professionel'));
        $etudiant6->setAnneUniversitaire($this->getReference('2018/2019'));
        $manager->persist($etudiant6);


        $manager->flush();

        $this->addReference('etudiant1',$etudiant1);
        $this->addReference('etudiant2',$etudiant2);
        $this->addReference('etudiant3',$etudiant3);
        $this->addReference('etudiant4',$etudiant4);
        $this->addReference('etudiant5',$etudiant5);
        $this->addReference('etudiant6',$etudiant6);
        //$this->addReference('SP1',$semestre2);
    }
    public function getOrder()
    {
        return 8;
    }
}
