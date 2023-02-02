<?php

namespace App\DataFixtures;

use \App\Entity\Championship;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ChampionshipFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $championship = new Championship();
        $championship->setName('National Basket of Cédric');
        $championship->setCreatedAt(new \DateTime('01-09-1993'));
        $manager->persist($championship);
        $this->addReference('National Basket of Cédric', $championship);
        $manager->flush();
    }
}
