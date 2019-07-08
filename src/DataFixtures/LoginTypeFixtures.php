<?php

namespace App\DataFixtures;

use App\Entity\LoginType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoginTypeFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $LT1 = new LoginType();
        $LT1->setType('enseignant');
        $manager->persist($LT1);

        $LT2 = new LoginType();
        $LT2->setType('étudiant');
        $manager->persist($LT2);

        $LT3 = new LoginType();
        $LT3->setType('administrateur');
        $manager->persist($LT3);

        $manager->flush();

        $this->addReference('enseignant',$LT1);
        $this->addReference('etudiant',$LT2);
        $this->addReference('administrateur',$LT3);
    }
    public function getOrder()
    {
        return 7;
    }
}
