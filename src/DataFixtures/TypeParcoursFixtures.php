<?php

namespace App\DataFixtures;

use App\Entity\TypeParcours;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class TypeParcoursFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $parcours1 = new TypeParcours();
        $parcours1->setType('académique');
        $manager->persist($parcours1);

        $parcours2 = new TypeParcours();
        $parcours2->setType('professionnel');
        $manager->persist($parcours2);

        $sortant = new TypeParcours();
        $sortant->setType('sortant');
        $manager->persist($sortant);

        $manager->flush();

        $this->addReference('academique',$parcours1);
        $this->addReference('professionel',$parcours2);
        $this->addReference('sortant',$sortant);
    }
    public function getOrder()
    {
        return 2;
    }
}
