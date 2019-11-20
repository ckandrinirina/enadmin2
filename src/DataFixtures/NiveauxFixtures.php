<?php

namespace App\DataFixtures;

use App\Entity\Niveaux;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class NiveauxFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $niveaux1 = new Niveaux();
        $niveaux1->setNiveau('L1');
        $niveaux1->setType($this->getReference('academique'));
        $niveaux1->setNom('L1');
        $manager->persist($niveaux1);

        $niveaux2 = new Niveaux();
        $niveaux2->setNiveau('L2');
        $niveaux2->setType($this->getReference('academique'));
        $niveaux2->setNom('L2');
        $manager->persist($niveaux2);

        $niveaux3 = new Niveaux();
        $niveaux3->setNiveau('L3');
        $niveaux3->setType($this->getReference('academique'));
        $niveaux3->setNom('L3');
        $manager->persist($niveaux3);

        $niveaux4 = new Niveaux();
        $niveaux4->setNiveau('M1');
        $niveaux4->setType($this->getReference('academique'));
        $niveaux4->setNom('M1');
        $manager->persist($niveaux4);

        $niveaux5 = new Niveaux();
        $niveaux5->setNiveau('M2IA');
        $niveaux5->setType($this->getReference('academique'));
        $niveaux5->setNom('M2(IA)');
        $manager->persist($niveaux5);

        $niveaux51 = new Niveaux();
        $niveaux51->setNiveau('M2EA');
        $niveaux51->setType($this->getReference('academique'));
        $niveaux51->setNom('M2(EA)');
        $manager->persist($niveaux51);

        $niveaux6 = new Niveaux();
        $niveaux6->setNiveau('MVR');
        $niveaux6->setType($this->getReference('academique'));
        $niveaux6->setNom('MVR');
        $manager->persist($niveaux6);

        $niveaux7 = new Niveaux();
        $niveaux7->setNiveau('LP1');
        $niveaux7->setType($this->getReference('professionel'));
        $niveaux7->setNom('L1');
        $manager->persist($niveaux7);

        $niveaux8 = new Niveaux();
        $niveaux8->setNiveau('LP2');
        $niveaux8->setType($this->getReference('professionel'));
        $niveaux8->setNom('L2');
        $manager->persist($niveaux8);

        $niveaux9 = new Niveaux();
        $niveaux9->setNiveau('LP3');
        $niveaux9->setType($this->getReference('professionel'));
        $niveaux9->setNom('L3');
        $manager->persist($niveaux9);

        $niveaux10 = new Niveaux();
        $niveaux10->setNiveau('MP1');
        $niveaux10->setType($this->getReference('professionel'));
        $niveaux10->setNom('M1');
        $manager->persist($niveaux10);

        $niveaux11 = new Niveaux();
        $niveaux11->setNiveau('MP2IA');
        $niveaux11->setType($this->getReference('professionel'));
        $niveaux11->setNom('M2(IA)');
        $manager->persist($niveaux11);

        $niveaux111 = new Niveaux();
        $niveaux111->setNiveau('MP2EA');
        $niveaux111->setType($this->getReference('professionel'));
        $niveaux111->setNom('M2(EA)');
        $manager->persist($niveaux111);

        $niveaux222 = new Niveaux();
        $niveaux222->setNiveau('TASI');
        $niveaux222->setType($this->getReference('professionel'));
        $niveaux222->setNom('TASI');
        $manager->persist($niveaux222);

        $sortant = new Niveaux();
        $sortant->setNiveau('sortant');
        $sortant->setType($this->getReference('sortant'));
        $sortant->setNom('sortant');
        $manager->persist($sortant);

        $manager->flush();

        $this->addReference('L1',$niveaux1);
        $this->addReference('L2',$niveaux2);
        $this->addReference('L3',$niveaux3);
        $this->addReference('M1',$niveaux4);
        $this->addReference('M2IA',$niveaux5);
        $this->addReference('M2EA',$niveaux51);
        $this->addReference('MVR',$niveaux6);
        $this->addReference('LP1',$niveaux7);
        $this->addReference('LP2',$niveaux8);
        $this->addReference('LP3',$niveaux9);
        $this->addReference('MP1',$niveaux10);
        $this->addReference('MP2IA',$niveaux11);
        $this->addReference('MP2EA',$niveaux111);
        $this->addReference('TASI',$niveaux222);
        $this->addReference('sortantNiv',$sortant);
    }
    public function getOrder()
    {
        return 3;
    }
}
