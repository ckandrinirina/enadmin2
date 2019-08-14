<?php

namespace App\DataFixtures;

use App\Entity\Salle;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface; 
use Doctrine\Common\Persistence\ObjectManager;

class SalleFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $salle1 = new Salle();
        $salle1->setSemestre($this->getReference('S1'));
        $salle1->setNiveau($this->getReference('L1'));
        $salle1->setParcour($this->getReference('academique'));
        $salle1->setSalleClass($this->getReference('salle1'));
        $manager->persist($salle1);

        $salle2 = new Salle();       
        $salle2->setSemestre($this->getReference('S2'));
        $salle2->setNiveau($this->getReference('L1'));
        $salle2->setParcour($this->getReference('academique'));
        $salle2->setSalleClass($this->getReference('salle2'));
        $manager->persist($salle2);

        $salle3 = new Salle();       
        $salle3->setSemestre($this->getReference('S3'));
        $salle3->setNiveau($this->getReference('L2'));
        $salle3->setParcour($this->getReference('academique'));
        $salle3->setSalleClass($this->getReference('salle3'));
        $manager->persist($salle3);


        $salle4 = new Salle();
        $salle4->setSemestre($this->getReference('S4'));
        $salle4->setNiveau($this->getReference('L2'));
        $salle4->setParcour($this->getReference('academique'));
        $salle4->setSalleClass($this->getReference('salle4'));
        $manager->persist($salle4);


        $salle5 = new Salle();
        $salle5->setSemestre($this->getReference('S1'));
        $salle5->setNiveau($this->getReference('LP1'));
        $salle5->setParcour($this->getReference('professionel'));
        $salle5->setSalleClass($this->getReference('salle5'));
        $manager->persist($salle5);

        $manager->flush();

        // $this->addReference('salle1',$salle1);
        // $this->addReference('salle2',$salle2);
        // $this->addReference('salle3',$salle3);
        // $this->addReference('salle4',$salle4);
        // $this->addReference('salle5',$salle5);
        // $this->addReference('salle6',$salle6);
        // $this->addReference('salle7',$salle7);
        // $this->addReference('salle8',$salle8);
        // $this->addReference('salle9',$salle9);
    }
    public function getOrder()
    {
        return 21;
    }
}
