<?php

namespace App\DataFixtures;

use App\Entity\Jours;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class JoursFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $jour1 = new Jours();
        $jour1->setJours('Lundi');
        $manager->persist($jour1);

        $jour2 = new Jours();
        $jour2->setJours('Mardi');
        $manager->persist($jour2);

        $jour3 = new Jours();
        $jour3->setJours('Mercredi');
        $manager->persist($jour3);

        $jour4 = new Jours();
        $jour4->setJours('Jeudi');
        $manager->persist($jour4);

        $jour5 = new Jours();
        $jour5->setJours('Vendredi');
        $manager->persist($jour5);

        $jour6 = new Jours();
        $jour6->setJours('Samedi');
        $manager->persist($jour6);

        $manager->flush();

        $this->addReference('lundi',$jour1);
        $this->addReference('mardi',$jour2);
        $this->addReference('mercredi',$jour3);
        $this->addReference('jeudi',$jour4);
        $this->addReference('vendredi',$jour5);
        $this->addReference('samedi',$jour6);
    }
    public function getOrder()
    {
        return 14;
    }
}
