<?php

namespace App\DataFixtures;

use \App\Entity\Game;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use DateTimeImmutable;


class GameFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for($i = 0; $i < 16; $i++)
        {
            $game = new Game();
            $game->setScore($faker->numberBetween(10,150));
            $game->setPosition($faker->word());
            $game->setStartedAt(new DateTimeImmutable('now'));

            $manager->persist($game);
        }

        $manager->flush();

    }
}