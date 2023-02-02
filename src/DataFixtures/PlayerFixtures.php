<?php

namespace App\DataFixtures;

use \App\Entity\Player;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker\Factory;

class PlayerFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for($i = 0; $i < 40; $i++)
        {
            $player = new Player();
            $player->setFirstname($faker->firstName());
            $player->setLastname($faker->lastName());
            $player->setDescription($faker->paragraphs(1, true));
            $randomIndex = array_rand(TeamFixtures::TEAMS);
            $team = TeamFixtures::TEAMS[$randomIndex]['name'];
            $player->setTeam($this->getReference($team));

            $manager->persist($player);

        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
           TeamFixtures::class,
        ];
    }
}