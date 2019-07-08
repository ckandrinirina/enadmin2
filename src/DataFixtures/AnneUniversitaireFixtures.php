<?php

namespace App\DataFixtures;

use App\Entity\AnneUniversitaire;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class AnneUniversitaireFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $AU1 = new AnneUniversitaire();
        $AU1->setAnneUniversitaire('2018/2019');
        $manager->persist($AU1);

        $AU2 = new AnneUniversitaire();
        $AU2->setAnneUniversitaire('2017/2018');
        $manager->persist($AU2);

        $AU3 = new AnneUniversitaire();
        $AU3->setAnneUniversitaire('2016/2017');
        $manager->persist($AU3);

        $AU4 = new AnneUniversitaire();
        $AU4->setAnneUniversitaire('2015/2016');
        $manager->persist($AU4);

        $AU5 = new AnneUniversitaire();
        $AU5->setAnneUniversitaire('2014/2015');
        $manager->persist($AU5);

        $manager->flush();

        $this->addReference('2018/2019',$AU1);
        $this->addReference('2017/2018',$AU2);
        $this->addReference('2016/2017',$AU2);
        $this->addReference('2015/2016',$AU2);
        $this->addReference('2014/2015',$AU2);
    }
    public function getOrder()
    {
        return 5;
    }
}
