<?php

namespace App\DataFixtures;

use App\Entity\EC;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class ECFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $EC1 = new EC();
        $EC1->setNom('Circuits Electroniques et Electriques 1');
        $EC1->setCode('E111CEE');
        $EC1->setCredit(3);
        $EC1->setCoefficient(0.33);
        $EC1->setUC($this->getReference('EN11'));
        $manager->persist($EC1);

        $EC2 = new EC();
        $EC2->setNom('Métrologie');
        $EC2->setCode('E112MET');
        $EC2->setCredit(3);
        $EC2->setCoefficient(0.33);
        $EC2->setUC($this->getReference('EN11'));
        $manager->persist($EC2);

        $EC3 = new EC();
        $EC3->setNom('Electrostatique');
        $EC3->setCode('E112EST');
        $EC3->setCredit(3);
        $EC3->setCoefficient(0.33);
        $EC3->setUC($this->getReference('EN11'));
        $manager->persist($EC3);

        $EC4 = new EC();
        $EC4->setNom('Algèbre1');
        $EC4->setCode('E121ALG');
        $EC4->setEnseignant($this->getReference('Falimanana'));
        $EC4->setCredit(2);
        $EC4->setCoefficient(0.33);
        $EC4->setUC($this->getReference('EN12'));
        $manager->persist($EC4);

        $EC5 = new EC();
        $EC5->setNom('Analyse1');
        $EC5->setEnseignant($this->getReference('Falimanana'));
        $EC5->setCode('E122ANL');
        $EC5->setCredit(2);
        $EC5->setCoefficient(0.33);
        $EC5->setUC($this->getReference('EN12'));
        $manager->persist($EC5);

        $EC6 = new EC();
        $EC6->setNom('Calcul vectoriel et intégral 1');
        $EC6->setEnseignant($this->getReference('Luisette'));
        $EC6->setCode('E123CVI');
        $EC6->setCredit(2);
        $EC6->setCoefficient(0.33);
        $EC6->setUC($this->getReference('EN12'));
        $manager->persist($EC6);

        $EC7 = new EC();
        $EC7->setNom('Architecture des Ordinateurs');
        $EC7->setCode('E131AOR');
        $EC7->setCredit(2);
        $EC7->setCoefficient(0.33);
        $EC7->setUC($this->getReference('EN13'));
        $manager->persist($EC7);

        $EC8 = new EC();
        $EC8->setNom('Algorithmique');
        $EC8->setCode('E132AGO');
        $EC8->setCredit(2);
        $EC8->setCoefficient(0.33);
        $EC8->setUC($this->getReference('EN13'));
        $manager->persist($EC8);

        $EC9 = new EC();
        $EC9->setNom('Système d\'exploitation');
        $EC9->setCode('E133SXP');
        $EC9->setCredit(2);
        $EC9->setCoefficient(0.33);
        $EC9->setUC($this->getReference('EN13'));
        $manager->persist($EC9);

        $EC10 = new EC();
        $EC10->setNom('Optique Géometrique');
        $EC10->setCode('E141OPG');
        $EC10->setEnseignant($this->getReference('Andrianirina'));
        $EC10->setCredit(2);
        $EC10->setCoefficient(0.5);
        $EC10->setUC($this->getReference('EN14'));
        $manager->persist($EC10);

        $EC11 = new EC();
        $EC11->setNom('Chimie Physique');
        $EC11->setEnseignant($this->getReference('Philippine'));
        $EC11->setCode('E142CPH');
        $EC11->setCredit(3);
        $EC11->setCoefficient(0.5);
        $EC11->setUC($this->getReference('EN14'));
        $manager->persist($EC11);

        $EC12 = new EC();
        $EC12->setNom('Français et Cadrage Culturel');
        $EC12->setCode('E151FCC');
        $EC12->setCredit(2);
        $EC12->setCoefficient(0.5);
        $EC12->setUC($this->getReference('EN15'));
        $manager->persist($EC12);

        $EC13 = new EC();
        $EC13->setNom('Initiation aux Etudes Universitaires');
        $EC13->setCode('E152IEN');
        $EC13->setCredit(3);
        $EC13->setCoefficient(0.5);
        $EC13->setUC($this->getReference('EN15'));
        $manager->persist($EC13);

        $EC14 = new EC();
        $EC14->setNom('Circuits Electroniques et Electriques 2');
        $EC14->setCode('E211CEE');
        $EC14->setCredit(2);
        $EC14->setCoefficient(0.5);
        $EC14->setUC($this->getReference('EN21'));
        $manager->persist($EC14);

        $EC15 = new EC();
        $EC15->setNom('Electrocinétique des Courants Continus');
        $EC15->setCode('E212ECC');
        $EC15->setCredit(3);
        $EC15->setCoefficient(0.5);
        $EC15->setUC($this->getReference('EN21'));
        $manager->persist($EC15);

        $EC16 = new EC();
        $EC16->setNom('Algèbre2');
        $EC16->setEnseignant($this->getReference('Falimanana'));
        $EC16->setCode('E221ALG');
        $EC16->setCredit(2);
        $EC16->setCoefficient(0.25);
        $EC16->setUC($this->getReference('EN22'));
        $manager->persist($EC16);

        $EC17 = new EC();
        $EC17->setNom('Analyse2');
        $EC17->setEnseignant($this->getReference('Falimanana'));
        $EC17->setCode('E222ANL');
        $EC17->setCredit(2);
        $EC17->setCoefficient(0.25);
        $EC17->setUC($this->getReference('EN22'));
        $manager->persist($EC17);

        $EC18 = new EC();
        $EC18->setNom('Calcul vectoriel et intégral 2');
        $EC18->setEnseignant($this->getReference('Luisette'));
        $EC18->setCode('E223CVI');
        $EC18->setCredit(2);
        $EC18->setCoefficient(0.25);
        $EC18->setUC($this->getReference('EN22'));
        $manager->persist($EC18);

        $EC19 = new EC();
        $EC19->setNom('Calcul Numérique');
        $EC19->setCode('E224CNU');
        $EC19->setCredit(3);
        $EC19->setCoefficient(0.25);
        $EC19->setUC($this->getReference('EN22'));
        $manager->persist($EC19);

        $EC20 = new EC();
        $EC20->setNom('Thermodinamique');
        $EC20->setCode('E231TRM');
        $EC20->setCredit(2);
        $EC20->setCoefficient(0.33);
        $EC20->setUC($this->getReference('EN23'));
        $manager->persist($EC20);

        $EC21 = new EC();
        $EC21->setNom('Optique Physique');
        $EC21->setEnseignant($this->getReference('Andrianirina'));
        $EC21->setCode('E232OPH');
        $EC21->setCredit(2);
        $EC21->setCoefficient(0.33);
        $EC21->setUC($this->getReference('EN23'));
        $manager->persist($EC21);

        $EC22 = new EC();
        $EC22->setNom('Mecanique Générale');
        $EC22->setEnseignant($this->getReference('Jean Masy'));
        $EC22->setCode('E233OPH');
        $EC22->setCredit(3);
        $EC22->setCoefficient(0.33);
        $EC22->setUC($this->getReference('EN23'));
        $manager->persist($EC22);

        $EC23 = new EC();
        $EC23->setNom('Macros Office');
        $EC23->setCode('E241MOF');
        $EC23->setCredit(3);
        $EC23->setCoefficient(0.5);
        $EC23->setUC($this->getReference('EN24'));
        $manager->persist($EC23);

        $EC24 = new EC();
        $EC24->setNom('Programmation en C');
        $EC24->setCode('E242PRC');
        $EC24->setCredit(2);
        $EC24->setCoefficient(0.5);
        $EC24->setUC($this->getReference('EN24'));
        $manager->persist($EC24);

        $EC25 = new EC();
        $EC25->setNom('Anglais');
        $EC25->setEnseignant($this->getReference('Lucienne'));
        $EC25->setCode('E251ANG');
        $EC25->setCredit(2);
        $EC25->setCoefficient(0.5);
        $EC25->setUC($this->getReference('EN25'));
        $manager->persist($EC25);

        $EC26 = new EC();
        $EC26->setNom('Français');
        $EC26->setCode('E252FRS');
        $EC26->setCredit(2);
        $EC26->setCoefficient(0.5);
        $EC26->setUC($this->getReference('EN25'));
        $manager->persist($EC26);

        $manager->flush();

        $this->addReference('E111CEE',$EC1);
        $this->addReference('analyse1',$EC2);
        $this->addReference('electrostatique',$EC3);
        $this->addReference('mecanique1',$EC4);
        $this->addReference('C',$EC6);
        $this->addReference('signauxD',$EC7);
        $this->addReference('algebre2',$EC9);
    }
    public function getOrder()
    {
        return 11;
    }
}
