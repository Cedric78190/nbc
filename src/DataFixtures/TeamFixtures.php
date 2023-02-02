<?php

namespace App\DataFixtures;

use \App\Entity\Team;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class TeamFixtures extends Fixture
{
    public const TEAMS = [
        [
            'name' => '76ers',
            'description' => 'Les 76ers de Philadelphie (Philadelphia 76ers en anglais) également surnommés les Sixers, sont une franchise de basket-ball de la National Basketball Association basée à Philadelphie dans le Commonwealth de Pennsylvanie. Son histoire commence en 1939 sous le nom des Nationals de Syracuse, une équipe professionnelle indépendante qui rejoint la National Basketball League (NBL) en 1946. Les Nationals entrent en NBA trois ans plus tard lors de la fusion entre la NBL et la BAA (Basketball Association of America). Les 76ers concourent dans la NBA en tant que membre de la conférence Est, au sein de la division Atlantique et joue ses matchs au Wells Fargo Center.'
        ],
        [
            'name' => 'Lakers',
            'description' => "La commune est située sur un plateau au sud de Versailles, à 21 km de la Porte d'Auteuil du Boulevard périphérique de Paris et à 28 km du centre de Paris. Elle est limitrophe de Bois-d'Arcy au nord-est, de Montigny-le-Bretonneux à l'est, de Magny-les-Hameaux au sud-est, du Mesnil-Saint-Denis et de Saint-Lambert-des-Bois au sud, de Élancourt à l'ouest et de Plaisir au nord. L'étang de Saint-Quentin et sa base de loisirs et de plein air et la réserve naturelle au nord. Une partie, 450 ha, de la forêt domaniale de Port-Royal, au sud, appelée le Bois de Trappes.",
        ],
        [
            'name' => 'Trappes',
            'description' => "La commune est située sur un plateau au sud de Versailles, à 21 km de la Porte d'Auteuil du Boulevard périphérique de Paris et à 28 km du centre de Paris. Elle est limitrophe de Bois-d'Arcy au nord-est, de Montigny-le-Bretonneux à l'est, de Magny-les-Hameaux au sud-est, du Mesnil-Saint-Denis et de Saint-Lambert-des-Bois au sud, de Élancourt à l'ouest et de Plaisir au nord. L'étang de Saint-Quentin et sa base de loisirs et de plein air et la réserve naturelle au nord. Une partie, 450 ha, de la forêt domaniale de Port-Royal, au sud, appelée le Bois de Trappes.",
        ],

        [
            'name' => 'OKC',
            'description' => "La commune est située sur un plateau au sud de Versailles, à 21 km de la Porte d'Auteuil du Boulevard périphérique de Paris et à 28 km du centre de Paris. Elle est limitrophe de Bois-d'Arcy au nord-est, de Montigny-le-Bretonneux à l'est, de Magny-les-Hameaux au sud-est, du Mesnil-Saint-Denis et de Saint-Lambert-des-Bois au sud, de Élancourt à l'ouest et de Plaisir au nord. L'étang de Saint-Quentin et sa base de loisirs et de plein air et la réserve naturelle au nord. Une partie, 450 ha, de la forêt domaniale de Port-Royal, au sud, appelée le Bois de Trappes.",
        ],
        [
            'name' => 'NOLA',
            'description' => "La commune est située sur un plateau au sud de Versailles, à 21 km de la Porte d'Auteuil du Boulevard périphérique de Paris et à 28 km du centre de Paris. Elle est limitrophe de Bois-d'Arcy au nord-est, de Montigny-le-Bretonneux à l'est, de Magny-les-Hameaux au sud-est, du Mesnil-Saint-Denis et de Saint-Lambert-des-Bois au sud, de Élancourt à l'ouest et de Plaisir au nord. L'étang de Saint-Quentin et sa base de loisirs et de plein air et la réserve naturelle au nord. Une partie, 450 ha, de la forêt domaniale de Port-Royal, au sud, appelée le Bois de Trappes.",
        ],
        [
            'name' => 'Celtics',
            'description' => "La commune est située sur un plateau au sud de Versailles, à 21 km de la Porte d'Auteuil du Boulevard périphérique de Paris et à 28 km du centre de Paris. Elle est limitrophe de Bois-d'Arcy au nord-est, de Montigny-le-Bretonneux à l'est, de Magny-les-Hameaux au sud-est, du Mesnil-Saint-Denis et de Saint-Lambert-des-Bois au sud, de Élancourt à l'ouest et de Plaisir au nord. L'étang de Saint-Quentin et sa base de loisirs et de plein air et la réserve naturelle au nord. Une partie, 450 ha, de la forêt domaniale de Port-Royal, au sud, appelée le Bois de Trappes.",
        ],
        [
            'name' => 'Nuggets',
            'description' => "La commune est située sur un plateau au sud de Versailles, à 21 km de la Porte d'Auteuil du Boulevard périphérique de Paris et à 28 km du centre de Paris. Elle est limitrophe de Bois-d'Arcy au nord-est, de Montigny-le-Bretonneux à l'est, de Magny-les-Hameaux au sud-est, du Mesnil-Saint-Denis et de Saint-Lambert-des-Bois au sud, de Élancourt à l'ouest et de Plaisir au nord. L'étang de Saint-Quentin et sa base de loisirs et de plein air et la réserve naturelle au nord. Une partie, 450 ha, de la forêt domaniale de Port-Royal, au sud, appelée le Bois de Trappes.",
        ],
        [
            'name' => 'Bucks',
            'description' => "La commune est située sur un plateau au sud de Versailles, à 21 km de la Porte d'Auteuil du Boulevard périphérique de Paris et à 28 km du centre de Paris. Elle est limitrophe de Bois-d'Arcy au nord-est, de Montigny-le-Bretonneux à l'est, de Magny-les-Hameaux au sud-est, du Mesnil-Saint-Denis et de Saint-Lambert-des-Bois au sud, de Élancourt à l'ouest et de Plaisir au nord. L'étang de Saint-Quentin et sa base de loisirs et de plein air et la réserve naturelle au nord. Une partie, 450 ha, de la forêt domaniale de Port-Royal, au sud, appelée le Bois de Trappes.",
        ],
    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::TEAMS as $_team)
        {
            $team = new Team();
            $team->setName($_team['name']);
            $team->setDescription($_team['description']);
            $team->setChampionship($this->getReference('National Basket of Cédric'));

            $this->addReference($_team['name'], $team);

            $manager->persist($team);


        }
        
        $manager->flush();
    }

    
    public function getDependencies(): array
    {
        return [
           ChampionshipFixtures::class,
        ];
    }
}