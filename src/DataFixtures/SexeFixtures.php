<?php

namespace App\DataFixtures;

use App\Entity\Sexe;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class SexeFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $sexe1 = new Sexe();
        $sexe1->setSexe('homme');
        $manager->persist($sexe1);

        $sexe2 = new Sexe();
        $sexe2->setSexe('femme');
        $manager->persist($sexe2);

        $manager->flush();

        $this->addReference('homme',$sexe1);
        $this->addReference('femme',$sexe2);
    }
    public function getOrder()
    {
        return 1;
    }
}
