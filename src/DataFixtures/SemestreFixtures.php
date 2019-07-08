<?php

namespace App\DataFixtures;

use App\Entity\Semestre;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class SemestreFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $semestre1 = new Semestre();
        $semestre1->setSemestre('S1');
        $semestre1->addNiveau($this->getReference('L1'));
        $manager->persist($semestre1);

        $semestre1p = new Semestre();
        $semestre1p->setSemestre('SP1');
        $semestre1p->addNiveau($this->getReference('LP1'));
        $manager->persist($semestre1p);

        $semestre2 = new Semestre();
        $semestre2->setSemestre('S2');
        $semestre2->addNiveau($this->getReference('L1'));
        $manager->persist($semestre2);

        $semestre2p = new Semestre();
        $semestre2p->setSemestre('SP2');
        $semestre2p->addNiveau($this->getReference('LP1'));
        $manager->persist($semestre2p);

        $semestre3 = new Semestre();
        $semestre3->setSemestre('S3');
        $semestre3->addNiveau($this->getReference('L2'));
        $manager->persist($semestre3);

        $semestre3p = new Semestre();
        $semestre3p->setSemestre('SP3');
        $semestre3p->addNiveau($this->getReference('LP2'));
        $manager->persist($semestre3p);

        $semestre4 = new Semestre();
        $semestre4->setSemestre('S4');
        $semestre4->addNiveau($this->getReference('L2'));
        $manager->persist($semestre4);

        $semestre4p = new Semestre();
        $semestre4p->setSemestre('SP4');
        $semestre4p->addNiveau($this->getReference('LP2'));
        $manager->persist($semestre4p);

        $semestre5 = new Semestre();
        $semestre5->setSemestre('S5');
        $semestre5->addNiveau($this->getReference('L3'));
        $manager->persist($semestre5);

        $semestre5p = new Semestre();
        $semestre5p->setSemestre('SP5');
        $semestre5p->addNiveau($this->getReference('LP3'));
        $manager->persist($semestre5p);


        $semestre6 = new Semestre();
        $semestre6->setSemestre('S6');
        $semestre6->addNiveau($this->getReference('L3'));
        $manager->persist($semestre6);

        $semestre6p = new Semestre();
        $semestre6p->setSemestre('SP6');
        $semestre6p->addNiveau($this->getReference('LP3'));
        $manager->persist($semestre6p);

        $semestre7 = new Semestre();
        $semestre7->setSemestre('S7');
        $semestre7->addNiveau($this->getReference('M1'));
        $manager->persist($semestre7);

        $semestre7p = new Semestre();
        $semestre7p->setSemestre('SP7');
        $semestre7p->addNiveau($this->getReference('MP1'));
        $manager->persist($semestre7p);

        $semestre8 = new Semestre();
        $semestre8->setSemestre('S8');
        $semestre8->addNiveau($this->getReference('M1'));
        $manager->persist($semestre8);

        $semestre8p = new Semestre();
        $semestre8p->setSemestre('SP8');
        $semestre8p->addNiveau($this->getReference('MP1'));
        $manager->persist($semestre8p);

        $semestre9Ia = new Semestre();
        $semestre9Ia->setSemestre('S9IA');
        $semestre9Ia->addNiveau($this->getReference('M2IA'));
        $manager->persist($semestre9Ia);

        $semestre9Ea = new Semestre();
        $semestre9Ea->setSemestre('S9EA');
        $semestre9Ea->addNiveau($this->getReference('M2EA'));
        $manager->persist($semestre9Ea);

        $semestre9Iap = new Semestre();
        $semestre9Iap->setSemestre('SP9IA');
        $semestre9Iap->addNiveau($this->getReference('MP2IA'));
        $manager->persist($semestre9Iap);

        $semestre9Eap = new Semestre();
        $semestre9Eap->setSemestre('SP9EA');
        $semestre9Eap->addNiveau($this->getReference('MP2EA'));
        $manager->persist($semestre9Eap);

        $semestre10Ia = new Semestre();
        $semestre10Ia->setSemestre('S10IA');
        $semestre10Ia->addNiveau($this->getReference('M2IA'));
        $manager->persist($semestre10Ia);

        $semestre10Ea = new Semestre();
        $semestre10Ea->setSemestre('S10EA');
        $semestre10Ea->addNiveau($this->getReference('M2EA'));
        $manager->persist($semestre10Ea);

        $semestre10Iap = new Semestre();
        $semestre10Iap->setSemestre('SP10IA');
        $semestre10Iap->addNiveau($this->getReference('MP2IA'));
        $manager->persist($semestre10Iap);

        $semestre10Eap = new Semestre();
        $semestre10Eap->setSemestre('SP10EA');
        $semestre10Eap->addNiveau($this->getReference('MP2EA'));
        $manager->persist($semestre10Eap);

        $semestre11 = new Semestre();
        $semestre11->setSemestre('S11');
        $semestre11->addNiveau($this->getReference('MVR'));
        $manager->persist($semestre11);

        $semestre12 = new Semestre();
        $semestre12->setSemestre('S12');
        $semestre12->addNiveau($this->getReference('MVR'));
        $manager->persist($semestre12);

        $manager->flush();

        $this->addReference('S1',$semestre1);
        $this->addReference('S2',$semestre2);
        $this->addReference('S3',$semestre3);
        $this->addReference('S4',$semestre4);
        $this->addReference('S5',$semestre5);
        $this->addReference('S6',$semestre6);
        $this->addReference('S7',$semestre7);
        $this->addReference('S8',$semestre8);
        $this->addReference('S9IA',$semestre9Ia);
        $this->addReference('S9EA',$semestre9Ea);
        $this->addReference('S10IA',$semestre10Ia);
        $this->addReference('S10EA',$semestre10Ea);
        $this->addReference('S11',$semestre11);
        $this->addReference('S12',$semestre12);
        $this->addReference('SP1',$semestre1p);
        $this->addReference('SP2',$semestre2p);
        $this->addReference('SP3',$semestre3p);
        $this->addReference('SP4',$semestre4p);
        $this->addReference('SP5',$semestre5p);
        $this->addReference('SP6',$semestre6p);
        $this->addReference('SP7',$semestre7p);
        $this->addReference('SP8',$semestre8p);
        $this->addReference('SP9IA',$semestre9Iap);
        $this->addReference('SP9EA',$semestre9Eap);
        $this->addReference('SP10IA',$semestre10Iap);
        $this->addReference('SP10EA',$semestre10Eap);
    }
    public function getOrder()
    {
        return 4;
    }
}
