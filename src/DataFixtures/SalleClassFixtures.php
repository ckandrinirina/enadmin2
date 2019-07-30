<?php

namespace App\DataFixtures;

use App\Entity\SalleClass;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class SalleClassFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $salleClass1 = new SalleClass();
        $salleClass1->setNom('salle1');
        $manager->persist($salleClass1);

        $salleClass2 = new SalleClass();
        $salleClass2->setNom('salle2');
        $manager->persist($salleClass2);

        $salleClass3 = new SalleClass();
        $salleClass3->setNom('salle3');
        $manager->persist($salleClass3);

        $salleClass4 = new SalleClass();
        $salleClass4->setNom('salle4');
        $manager->persist($salleClass4);

        $salleClass5 = new SalleClass();
        $salleClass5->setNom('salle5');
        $manager->persist($salleClass5);

        $manager->flush();

        $this->addReference('salle1',$salleClass1);
        $this->addReference('salle2',$salleClass2);
        $this->addReference('salle3',$salleClass3);
        $this->addReference('salle4',$salleClass4);
        $this->addReference('salle5',$salleClass5);
    }
    public function getOrder()
    {
        return 17;
    }
}
