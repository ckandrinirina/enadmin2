<?php

namespace App\DataFixtures;

use App\Entity\Droit;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class DroitFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $droit1 = new Droit();
        $droit1->setValeur('100000');
        $manager->persist($droit1);

        $droit2 = new Droit();
        $droit2->setValeur('200000');
        $manager->persist($droit2);

        $manager->flush();

        $this->addReference('droit1',$droit1);
        $this->addReference('droit2',$droit2);
    }
    public function getOrder()
    {
        return 20;
    }
}
