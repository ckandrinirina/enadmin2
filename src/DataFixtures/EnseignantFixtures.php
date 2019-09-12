<?php

namespace App\DataFixtures;

use App\Entity\Enseignant;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class EnseignantFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        // $enseignant1 = new Enseignant();
        // $enseignant1->setNom('Mme RAHARIMBOLA');
        // $enseignant1->setPrenom('Lucienne');
        // $enseignant1->setContact('contact_enseignant1');
        // $enseignant1->setAdresse('adresse_enseignant1');
        // $enseignant1->setDateNaissance(new \DateTime());
        // $enseignant1->setLieuxNaissance('lieux_naissance_enseignant1');
        // $enseignant1->setType($this->getReference('vacataire'));
        // $manager->persist($enseignant1);

        // $enseignant2 = new Enseignant();
        // $enseignant2->setNom('M RANDIMBINDRAINIBE');
        // $enseignant2->setPrenom('Falimanana');
        // $enseignant2->setContact('contact_enseignant2');
        // $enseignant2->setAdresse('adresse_enseignant2');
        // $enseignant2->setDateNaissance(new \DateTime());
        // $enseignant2->setLieuxNaissance('lieux_naissance_enseignant2');
        // $enseignant2->setType($this->getReference('vacataire'));
        // $manager->persist($enseignant2);

        // $enseignant3 = new Enseignant();
        // $enseignant3->setNom('Mme ELISOAMIADANA');
        // $enseignant3->setPrenom('Philippine');
        // $enseignant3->setContact('contact_enseignant3');
        // $enseignant3->setAdresse('adresse_enseignant3');
        // $enseignant3->setDateNaissance(new \DateTime());
        // $enseignant3->setLieuxNaissance('lieux_naissance_enseignant3');
        // $enseignant3->setType($this->getReference('vacataire'));
        // $manager->persist($enseignant3);

        // $enseignant4 = new Enseignant();
        // $enseignant4->setNom('Mme RAHARIMINA');
        // $enseignant4->setPrenom('Luisette');
        // $enseignant4->setContact('contact_enseignant4');
        // $enseignant4->setAdresse('adresse_enseignant4');
        // $enseignant4->setDateNaissance(new \DateTime());
        // $enseignant4->setLieuxNaissance('lieux_naissance_enseignant4');
        // $enseignant4->setType($this->getReference('vacataire'));
        // $manager->persist($enseignant4);

        // $enseignant5 = new Enseignant();
        // $enseignant5->setNom('M RAVALINIAINA');
        // $enseignant5->setPrenom('Jean Désiré');
        // $enseignant5->setContact('contact_enseignant5');
        // $enseignant5->setAdresse('adresse_enseignant5');
        // $enseignant5->setDateNaissance(new \DateTime());
        // $enseignant5->setLieuxNaissance('lieux_naissance_enseignant5');
        // $enseignant5->setType($this->getReference('vacataire'));
        // $manager->persist($enseignant5);

        // $enseignant6 = new Enseignant();
        // $enseignant6->setNom('M RAMILISON');
        // $enseignant6->setPrenom('Jean Masy');
        // $enseignant6->setContact('contact_enseignant6');
        // $enseignant6->setAdresse('adresse_enseignant6');
        // $enseignant6->setDateNaissance(new \DateTime());
        // $enseignant6->setLieuxNaissance('lieux_naissance_enseignant6');
        // $enseignant6->setType($this->getReference('vacataire'));
        // $manager->persist($enseignant6);

        // $enseignant7 = new Enseignant();
        // $enseignant7->setNom('M RANDRIANTSIMBAZAFY');
        // $enseignant7->setPrenom('Andrianirina');
        // $enseignant7->setContact('contact_enseignant7');
        // $enseignant7->setAdresse('adresse_enseignant7');
        // $enseignant7->setDateNaissance(new \DateTime());
        // $enseignant7->setLieuxNaissance('lieux_naissance_enseignant7');
        // $enseignant7->setType($this->getReference('vacataire'));
        // $manager->persist($enseignant7);

        // $enseignant8 = new Enseignant();
        // $enseignant8->setNom('M RASOANOAVY');
        // $enseignant8->setPrenom('Faliniaina');
        // $enseignant8->setContact('contact_enseignant8');
        // $enseignant8->setAdresse('adresse_enseignant8');
        // $enseignant8->setDateNaissance(new \DateTime());
        // $enseignant8->setLieuxNaissance('lieux_naissance_enseignant8');
        // $enseignant8->setType($this->getReference('vacataire'));
        // $manager->persist($enseignant8);

        // $this->addReference('Lucienne',$enseignant1);
        // $this->addReference('Falimanana',$enseignant2);
        // $this->addReference('Philippine',$enseignant3);
        // $this->addReference('Luisette',$enseignant4);
        // $this->addReference('Jean Désiré',$enseignant5);
        // $this->addReference('Jean Masy',$enseignant6);
        // $this->addReference('Andrianirina',$enseignant7);
        // $this->addReference('Faliniaina',$enseignant8);

        $manager->flush();
    }
    public function getOrder()
    {
        return 10;
    }
}
