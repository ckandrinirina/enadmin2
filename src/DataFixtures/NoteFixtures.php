<?php

namespace App\DataFixtures;

use App\Entity\Note;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class NoteFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        // $note1 = new Note();
        // $note1->setEtudiant($this->getReference('etudiant1'));
        // $note1->setValeur('12.5');
        // $note1->setEC($this->getReference('algebre1'));
        // $note1->setSemestre($this->getReference('S1'));
        // $note1->setAnneUniversitaire($this->getReference('2018/2019'));
        // $note1->setNiveaux($this->getReference('L1'));
        // $note1->setIsRatrapage(false);
        // $note1->setIsValide(true);
        // $manager->persist($note1);

        // $note2 = new Note();
        // $note2->setEtudiant($this->getReference('etudiant2'));
        // $note2->setValeur('9.5');
        // $note2->setEC($this->getReference('algebre1'));
        // $note2->setSemestre($this->getReference('S1'));
        // $note2->setAnneUniversitaire($this->getReference('2018/2019'));
        // $note2->setNiveaux($this->getReference('L1'));
        // $note2->setIsRatrapage(false);
        // $note2->setIsValide(false);
        // $manager->persist($note2);

        // $note3 = new Note();
        // $note3->setEtudiant($this->getReference('etudiant3'));
        // $note3->setValeur('10.5');
        // $note3->setEC($this->getReference('algebre1'));
        // $note3->setSemestre($this->getReference('S1'));
        // $note3->setAnneUniversitaire($this->getReference('2018/2019'));
        // $note3->setNiveaux($this->getReference('L1'));
        // $note3->setIsRatrapage(false);
        // $note3->setIsValide(true);
        // $manager->persist($note3);

        $note4 = new Note();
        $note4->setEtudiant($this->getReference('etudiant1'));
        $note4->setValeur('15.5');
        $note4->setValueCoeff('3.5');
        $note4->setEC($this->getReference('mecanique1'));
        $note4->setSemestre($this->getReference('S1'));
        $note4->setAnneUniversitaire($this->getReference('2018/2019'));
        $note4->setNiveaux($this->getReference('L1'));
        $note4->setIsRatrapage(false);
        $note4->setIsValide(true);
        $manager->persist($note4);

        $note5 = new Note();
        $note5->setEtudiant($this->getReference('etudiant2'));
        $note5->setValeur('16');
        $note5->setValueCoeff('3.5');
        $note5->setEC($this->getReference('mecanique1'));
        $note5->setSemestre($this->getReference('S1'));
        $note5->setAnneUniversitaire($this->getReference('2018/2019'));
        $note5->setNiveaux($this->getReference('L1'));
        $note5->setIsRatrapage(false);
        $note5->setIsValide(true);
        $manager->persist($note5);

        $note6 = new Note();
        $note6->setEtudiant($this->getReference('etudiant3'));
        $note6->setValeur('12');
        $note6->setValueCoeff('3.5');
        $note6->setEC($this->getReference('mecanique1'));
        $note6->setSemestre($this->getReference('S1'));
        $note6->setAnneUniversitaire($this->getReference('2018/2019'));
        $note6->setNiveaux($this->getReference('L1'));
        $note6->setIsRatrapage(false);
        $note6->setIsValide(true);
        $manager->persist($note6);

        $note7 = new Note();
        $note7->setEtudiant($this->getReference('etudiant1'));
        $note7->setValeur('7.5');
        $note7->setValueCoeff('3.5');
        $note7->setEC($this->getReference('analyse1'));
        $note7->setSemestre($this->getReference('S1'));
        $note7->setAnneUniversitaire($this->getReference('2018/2019'));
        $note7->setNiveaux($this->getReference('L1'));
        $note7->setIsRatrapage(false);
        $note7->setIsValide(false);
        $manager->persist($note7);

        $note8 = new Note();
        $note8->setEtudiant($this->getReference('etudiant2'));
        $note8->setValeur('12');
        $note8->setValueCoeff('3.5');
        $note8->setEC($this->getReference('analyse1'));
        $note8->setSemestre($this->getReference('S1'));
        $note8->setAnneUniversitaire($this->getReference('2018/2019'));
        $note8->setNiveaux($this->getReference('L1'));
        $note8->setIsRatrapage(false);
        $note8->setIsValide(true);
        $manager->persist($note8);

        $note9 = new Note();
        $note9->setEtudiant($this->getReference('etudiant3'));
        $note9->setValeur('5');
        $note9->setValueCoeff('3.5');
        $note9->setEC($this->getReference('analyse1'));
        $note9->setSemestre($this->getReference('S1'));
        $note9->setAnneUniversitaire($this->getReference('2018/2019'));
        $note9->setNiveaux($this->getReference('L1'));
        $note9->setIsRatrapage(false);
        $note9->setIsValide(false);
        $manager->persist($note9);

        $note18 = new Note();
        $note18->setEtudiant($this->getReference('etudiant3'));
        $note18->setValeur('10');
        $note18->setValueCoeff('3.5');
        $note18->setEC($this->getReference('analyse1'));
        $note18->setSemestre($this->getReference('S1'));
        $note18->setAnneUniversitaire($this->getReference('2018/2019'));
        $note18->setNiveaux($this->getReference('L1'));
        $note18->setIsRatrapage(true);
        $note18->setIsValide(true);
        $manager->persist($note18);

        $note10 = new Note();
        $note10->setEtudiant($this->getReference('etudiant4'));
        $note10->setValeur('18');
        $note10->setValueCoeff('3.5');
        $note10->setEC($this->getReference('analyse1'));
        $note10->setSemestre($this->getReference('S1'));
        $note10->setAnneUniversitaire($this->getReference('2018/2019'));
        $note10->setNiveaux($this->getReference('LP1'));
        $note10->setIsRatrapage(false);
        $note10->setIsValide(true);
        $manager->persist($note10);

        $note11 = new Note();
        $note11->setEtudiant($this->getReference('etudiant4'));
        $note11->setValeur('11');
        $note11->setValueCoeff('3.5');
        $note11->setEC($this->getReference('mecanique1'));
        $note11->setSemestre($this->getReference('S1'));
        $note11->setAnneUniversitaire($this->getReference('2018/2019'));
        $note11->setNiveaux($this->getReference('LP1'));
        $note11->setIsRatrapage(false);
        $note11->setIsValide(true);
        $manager->persist($note11);

        $note12 = new Note();
        $note12->setEtudiant($this->getReference('etudiant5'));
        $note12->setValeur('8');
        $note12->setValueCoeff('3.5');
        $note12->setEC($this->getReference('mecanique1'));
        $note12->setSemestre($this->getReference('S1'));
        $note12->setAnneUniversitaire($this->getReference('2018/2019'));
        $note12->setNiveaux($this->getReference('LP1'));
        $note12->setIsRatrapage(false);
        $note12->setIsValide(false);
        $manager->persist($note12);

        $note19 = new Note();
        $note19->setEtudiant($this->getReference('etudiant5'));
        $note19->setValeur('11');
        $note19->setValueCoeff('3.5');
        $note19->setEC($this->getReference('mecanique1'));
        $note19->setSemestre($this->getReference('S1'));
        $note19->setAnneUniversitaire($this->getReference('2018/2019'));
        $note19->setNiveaux($this->getReference('LP1'));
        $note19->setIsRatrapage(true);
        $note19->setIsValide(true);
        $manager->persist($note12);

        $note13 = new Note();
        $note13->setEtudiant($this->getReference('etudiant5'));
        $note13->setValeur('12');
        $note13->setValueCoeff('3.5');
        $note13->setEC($this->getReference('analyse1'));
        $note13->setSemestre($this->getReference('S1'));
        $note13->setAnneUniversitaire($this->getReference('2018/2019'));
        $note13->setNiveaux($this->getReference('LP1'));
        $note13->setIsRatrapage(false);
        $note13->setIsValide(true);
        $manager->persist($note13);

        $note14 = new Note();
        $note14->setEtudiant($this->getReference('etudiant6'));
        $note14->setValeur('7');
        $note14->setValueCoeff('3.5');
        $note14->setEC($this->getReference('mecanique1'));
        $note14->setSemestre($this->getReference('S1'));
        $note14->setAnneUniversitaire($this->getReference('2018/2019'));
        $note14->setNiveaux($this->getReference('LP1'));
        $note14->setIsRatrapage(false);
        $note14->setIsValide(false);
        $manager->persist($note14);

        $note15 = new Note();
        $note15->setEtudiant($this->getReference('etudiant6'));
        $note15->setValeur('12');
        $note15->setValueCoeff('3.5');
        $note15->setEC($this->getReference('analyse1'));
        $note15->setSemestre($this->getReference('S1'));
        $note15->setAnneUniversitaire($this->getReference('2018/2019'));
        $note15->setNiveaux($this->getReference('LP1'));
        $note15->setIsRatrapage(false);
        $note15->setIsValide(true);
        $manager->persist($note15);

        $note20 = new Note();
        $note20->setEtudiant($this->getReference('etudiant6'));
        $note20->setValeur('7');
        $note20->setValueCoeff('3.5');
        $note20->setEC($this->getReference('mecanique1'));
        $note20->setSemestre($this->getReference('S1'));
        $note20->setAnneUniversitaire($this->getReference('2018/2019'));
        $note20->setNiveaux($this->getReference('LP1'));
        $note20->setIsRatrapage(true);
        $note20->setIsValide(false);
        $manager->persist($note20);

        $note21 = new Note();
        $note21->setEtudiant($this->getReference('etudiant3'));
        $note21->setValeur('16');
        $note21->setValueCoeff('3.5');
        $note21->setEC($this->getReference('analyse1'));
        $note21->setSemestre($this->getReference('S1'));
        $note21->setAnneUniversitaire($this->getReference('2018/2019'));
        $note21->setNiveaux($this->getReference('L1'));
        $note21->setIsRatrapage(true);
        $note21->setIsValide(true);
        $manager->persist($note21);

        // $note16 = new Note();
        // $note16->setEtudiant($this->getReference('etudiant2'));
        // $note16->setValeur('15');
        // $note16->setEC($this->getReference('algebre1'));
        // $note16->setSemestre($this->getReference('S1'));
        // $note16->setAnneUniversitaire($this->getReference('2018/2019'));
        // $note16->setNiveaux($this->getReference('L1'));
        // $note16->setIsRatrapage(true);
        // $note16->setIsValide(true);
        // $manager->persist($note16);

        $note17 = new Note();
        $note17->setEtudiant($this->getReference('etudiant1'));
        $note17->setValeur('15');
        $note17->setValueCoeff('3.5');
        $note17->setEC($this->getReference('analyse1'));
        $note17->setSemestre($this->getReference('S1'));
        $note17->setAnneUniversitaire($this->getReference('2018/2019'));
        $note17->setNiveaux($this->getReference('L1'));
        $note17->setIsRatrapage(true);
        $note17->setIsValide(true);
        $manager->persist($note17);

        $manager->flush();

        // $this->addReference('note1',$note1);
        // $this->addReference('note2',$note2);
        // $this->addReference('note3',$note3);
        // $this->addReference('note4',$note4);
        // $this->addReference('note5',$note5);
        // $this->addReference('note6',$note6);
        // $this->addReference('note7',$note7);
        // $this->addReference('note8',$note8);
        // $this->addReference('note9',$note9);
    }
    public function getOrder()
    {
        return 13;
    }
}
