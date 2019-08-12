<?php

namespace App\DataFixtures;

use App\Entity\RepartitionEC;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class RepartitionECFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $RE1 = new RepartitionEC();
        $RE1->setEc($this->getReference('E111CEE'));
        $RE1->setSemestre($this->getReference('S1'));
        $RE1->setNiveaux($this->getReference('L1'));
        $manager->persist($RE1);

        $RE2 = new RepartitionEC();
        $RE2->setEc($this->getReference('C'));
        $RE2->setSemestre($this->getReference('S8'));
        $RE2->setNiveaux($this->getReference('M1'));
        $manager->persist($RE2);

        $RE3 = new RepartitionEC();
        $RE3->setEc($this->getReference('mecanique1'));
        $RE3->setSemestre($this->getReference('S1'));
        $RE3->setNiveaux($this->getReference('L1'));
        $manager->persist($RE3);

        $RE4 = new RepartitionEC();
        $RE4->setEc($this->getReference('analyse1'));
        $RE4->setSemestre($this->getReference('S1'));
        $RE4->setNiveaux($this->getReference('L1'));
        $manager->persist($RE4);

        // $RE5 = new RepartitionEC();
        // $RE5->setEc($this->getReference('analyse2'));
        // $RE5->setSemestre($this->getReference('S1'));
        // $RE5->setNiveaux($this->getReference('LP1'));
        // $manager->persist($RE5);

        $RE6 = new RepartitionEC();
        $RE6->setEc($this->getReference('mecanique1'));
        $RE6->setSemestre($this->getReference('S1'));
        $RE6->setNiveaux($this->getReference('LP1'));
        $manager->persist($RE6);

        $manager->flush();

        // $this->addReference('repartition1',$RE1);
        // $this->addReference('repartition2',$RE2);
        // $this->addReference('repartition3',$RE3);
        // $this->addReference('repartition4',$RE4);
        // $this->addReference('repartition5',$RE5);
        // $this->addReference('repartition6',$RE6);
    }
    public function getOrder()
    {
        return 12;
    }
}
