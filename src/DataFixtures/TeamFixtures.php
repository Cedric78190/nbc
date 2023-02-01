<?php

namespace App\DataFixtures;

use \App\Entity\Team;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


class TeamFixtures extends AppFixtures
{
    public const TEAMS = [
        '76ers',
        'Lakers',
        'Trappes',
        'OKC',
        'NOLA',
        'Celtics',
        'Nuggets',
        'Bucks',
    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::TEAMS as $teamName)
        {
            $team = new Team();
            $team->setName($teamName);
            $manager->persist($team);
            $manager->flush();

        }
    }
}
