<?php

namespace App\DataFixtures;

use App\Entity\EnseignantType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class EnseignantTypeFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $ET1 = new EnseignantType();
        $ET1->setType('permanent');
        $manager->persist($ET1);

        $ET2 = new EnseignantType();
        $ET2->setType('vacataire');
        $manager->persist($ET2);

        $manager->flush();

        $this->addReference('permanent',$ET1);
        $this->addReference('vacataire',$ET2);
    }
    public function getOrder()
    {
        return 6;
    }
}
