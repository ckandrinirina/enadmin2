<?php

namespace App\DataFixtures;

use App\Entity\Heures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class HeuresFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $heures1 = new Heures();
        $heures1->setHeures('07:30 à 09:30');
        $manager->persist($heures1);

        $heures2 = new Heures();
        $heures2->setHeures('09:30 à 11:30');
        $manager->persist($heures2);

        $heures3 = new Heures();
        $heures3->setHeures('12:30 à 14:30');
        $manager->persist($heures3);

        $heures4 = new Heures();
        $heures4->setHeures('14:30 à 16:30');
        $manager->persist($heures4);

        $this->addReference('1', $heures1);
        $this->addReference('2', $heures2);
        $this->addReference('3', $heures3);
        $this->addReference('4', $heures4);

        $manager->flush();
    }
    public function getOrder()
    {
        return 15;
    }
}
