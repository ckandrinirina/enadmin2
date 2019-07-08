<?php

namespace App\DataFixtures;

use App\Entity\UC;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class UCFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $UC1 = new UC();
        $UC1->setNom('EN11');
        $UC1->setCredit(9);
        $UC1->setCoefficient(1);
        $UC1->addNiveau($this->getReference('L1'));
        $UC1->addNiveau($this->getReference('LP1'));
        $UC1->addSemestre($this->getReference('S1'));
        $UC1->addSemestre($this->getReference('SP1'));
        //$UC1->addType($this->getReference('academique'));
        //$UC1->addType($this->getReference('professionel'));
        $manager->persist($UC1);

        $UC2 = new UC();
        $UC2->setNom('EN12');
        $UC2->setCredit(6);
        $UC2->setCoefficient(1);
        $UC2->addNiveau($this->getReference('L1'));
        $UC2->addNiveau($this->getReference('LP1'));
        $UC2->addSemestre($this->getReference('S1'));
        $UC2->addSemestre($this->getReference('SP1'));
        // $UC2->addType($this->getReference('academique'));
        // $UC2->addType($this->getReference('professionel'));
        $manager->persist($UC2);

        $UC3 = new UC();
        $UC3->setNom('EN13');
        $UC3->setCredit(6);
        $UC3->setCoefficient(1);
        $UC3->addNiveau($this->getReference('L1'));
        $UC3->addNiveau($this->getReference('LP1'));
        $UC3->addSemestre($this->getReference('S1'));
        $UC3->addSemestre($this->getReference('SP1'));
        // $UC3->addType($this->getReference('academique'));
        // $UC3->addType($this->getReference('professionel'));
        $manager->persist($UC3);

        $UC4 = new UC();
        $UC4->setNom('EN14');
        $UC4->setCredit(5);
        $UC4->setCoefficient(1);
        $UC4->addNiveau($this->getReference('L1'));
        $UC4->addNiveau($this->getReference('LP1'));
        $UC4->addSemestre($this->getReference('S1'));
        $UC4->addSemestre($this->getReference('SP1'));
        // $UC4->addType($this->getReference('academique'));
        // $UC4->addType($this->getReference('professionel'));
        $manager->persist($UC4);

        $UC5 = new UC();
        $UC5->setNom('EN15');
        $UC5->setCredit(4);
        $UC5->setCoefficient(1);
        $UC5->addNiveau($this->getReference('L1'));
        $UC5->addNiveau($this->getReference('LP1'));
        $UC5->addSemestre($this->getReference('S1'));
        $UC5->addSemestre($this->getReference('SP1'));
        // $UC5->addType($this->getReference('academique'));
        // $UC5->addType($this->getReference('professionel'));
        $manager->persist($UC5);

        $UC6 = new UC();
        $UC6->setNom('EN21');
        $UC6->setCredit(5);
        $UC6->setCoefficient(1);
        $UC6->addNiveau($this->getReference('L1'));
        $UC6->addNiveau($this->getReference('LP1'));
        $UC6->addSemestre($this->getReference('S2'));
        $UC6->addSemestre($this->getReference('SP2'));
        // $UC6->addType($this->getReference('academique'));
        // $UC6->addType($this->getReference('professionel'));
        $manager->persist($UC6);

        $UC7 = new UC();
        $UC7->setNom('EN22');
        $UC7->setCredit(9);
        $UC7->setCoefficient(1);
        $UC7->addNiveau($this->getReference('L1'));
        $UC7->addNiveau($this->getReference('LP1'));
        $UC7->addSemestre($this->getReference('S2'));
        $UC7->addSemestre($this->getReference('SP2'));
        // $UC7->addType($this->getReference('academique'));
        // $UC7->addType($this->getReference('professionel'));
        $manager->persist($UC7);

        $UC8 = new UC();
        $UC8->setNom('EN23');
        $UC8->setCredit(7);
        $UC8->setCoefficient(1);
        $UC8->addNiveau($this->getReference('L1'));
        $UC8->addNiveau($this->getReference('LP1'));
        $UC8->addSemestre($this->getReference('S2'));
        $UC8->addSemestre($this->getReference('SP2'));
        // $UC8->addType($this->getReference('academique'));
        // $UC8->addType($this->getReference('professionel'));
        $manager->persist($UC8);

        $UC9 = new UC();
        $UC9->setNom('EN24');
        $UC9->setCredit(5);
        $UC9->setCoefficient(1);
        $UC9->addNiveau($this->getReference('L1'));
        $UC9->addNiveau($this->getReference('LP1'));
        $UC9->addSemestre($this->getReference('S2'));
        $UC9->addSemestre($this->getReference('SP2'));
        // $UC9->addType($this->getReference('academique'));
        // $UC9->addType($this->getReference('professionel'));
        $manager->persist($UC9);

        $UC10 = new UC();
        $UC10->setNom('EN25');
        $UC10->setCredit(4);
        $UC10->setCoefficient(1);
        $UC10->addNiveau($this->getReference('L1'));
        $UC10->addNiveau($this->getReference('LP1'));
        $UC10->addSemestre($this->getReference('S2'));
        $UC10->addSemestre($this->getReference('SP2'));
        // $UC10->addType($this->getReference('academique'));
        // $UC10->addType($this->getReference('professionel'));
        $manager->persist($UC10);

        $UC11 = new UC();
        $UC11->setNom('EN31');
        $UC11->setCredit(4);
        $UC11->setCoefficient(1);
        $UC11->addNiveau($this->getReference('L2'));
        $UC11->addNiveau($this->getReference('LP2'));
        $UC11->addSemestre($this->getReference('S3'));
        $UC11->addSemestre($this->getReference('SP3'));
        // $UC11->addType($this->getReference('academique'));
        // $UC11->addType($this->getReference('professionel'));
        $manager->persist($UC11);

        $this->addReference('EN11',$UC1);
        $this->addReference('EN12',$UC2);
        $this->addReference('EN13',$UC3);
        $this->addReference('EN14',$UC4);
        $this->addReference('EN15',$UC5);
        $this->addReference('EN21',$UC6);
        $this->addReference('EN22',$UC7);
        $this->addReference('EN23',$UC8);
        $this->addReference('EN24',$UC9);
        $this->addReference('EN25',$UC10);
        $this->addReference('EN31',$UC11);

        $manager->flush();
    }
    public function getOrder()
    {
        return 9;
    }
}
