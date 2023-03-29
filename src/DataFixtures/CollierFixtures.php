<?php

namespace App\DataFixtures;

use App\Entity\Collier;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class CollierFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $collier = new Collier();
        $collier->setTag('collier');
        $collier->setTitle('bleu');
        $collier->setDescription('');
        $collier->setImageName('bleu1.jpeg');
        $collier->setPrix('75.00');
        $collier->setSlug('');
        $manager->persist($collier);

        $collier = new Collier();
        $collier->setTag('collier');
        $collier->setTitle('OR');
        $collier->setDescription('');
        $collier->setImageName('collier1.jpeg');
        $collier->setPrix('75.00');
        $collier->setSlug('');
        $manager->persist($collier);

        $collier = new Collier();
        $collier->setTag('collier');
        $collier->setTitle('Croix');
        $collier->setDescription('');
        $collier->setImageName('cruz1.jpeg');
        $collier->setPrix('75.00');
        $collier->setSlug('');
        $manager->persist($collier);

        $collier = new Collier();
        $collier->setTag('collier');
        $collier->setTitle('Lion');
        $collier->setDescription('');
        $collier->setImageName('leon1.jpeg');
        $collier->setPrix('75.00');
        $collier->setSlug('');
        $manager->persist($collier);

        $collier = new Collier();
        $collier->setTag('collier');
        $collier->setTitle('Perle');
        $collier->setDescription('');
        $collier->setImageName('perle1.jpeg');
        $collier->setPrix('75.00');
        $collier->setSlug('');
        $manager->persist($collier);

        $collier = new Collier();
        $collier->setTag('collier');
        $collier->setTitle('Dia De Muertos');
        $collier->setDescription('');
        $collier->setImageName('tete1.jpeg');
        $collier->setPrix('75.00');
        $collier->setSlug('');
        $manager->persist($collier);

        $manager->flush();
    }
}
