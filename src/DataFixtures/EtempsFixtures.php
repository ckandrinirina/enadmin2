<?php

namespace App\DataFixtures;

use App\Entity\EmploiDuTemps;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class EtempsFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        // $et1 = new EmploiDuTemps();
        // $et1->setJour($this->getReference('lundi'));
        // $et1->setHeure($this->getReference('1') );
        // $et1->setEc($this->getReference('algebre1'));
        // $et1->setNiveau($this->getReference('L1'));
        // $manager->persist($et1);

        // $et2 = new EmploiDuTemps();
        // $et2->setJour($this->getReference('mercredi'));
        // $et2->setHeure($this->getReference('3'));
        // $et2->setEc($this->getReference('analyse1'));
        // $et1->setNiveau($this->getReference('L1'));
        // $manager->persist($et2);

        $manager->flush();
    }
    public function getOrder()
    {
        return 16;
    }
}
