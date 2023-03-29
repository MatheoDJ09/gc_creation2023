<?php

namespace App\DataFixtures;

use App\Entity\Bracelet;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class BraceletFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $bracelet = new Bracelet();
        $bracelet->setTag('bracelet');
        $bracelet->setTitle('azul');
        $bracelet->setDescription('');
        $bracelet->setImageName('azul1.jpeg');
        $bracelet->setPrix('100.00');
        $bracelet->setSlug('');
        $manager->persist($bracelet);
        
        $bracelet = new Bracelet();
        $bracelet->setTag('bracelet');
        $bracelet->setTitle('Bleu');
        $bracelet->setDescription('');
        $bracelet->setImageName('bleu1.jpeg');
        $bracelet->setPrix('100.00');
        $bracelet->setSlug('');
        $manager->persist($bracelet);

        $bracelet = new Bracelet();
        $bracelet->setTag('bracelet');
        $bracelet->setTitle('Esmeralda');
        $bracelet->setDescription('');
        $bracelet->setImageName('esmeralda1.jpeg');
        $bracelet->setPrix('100.00');
        $bracelet->setSlug('');
        $manager->persist($bracelet);

        $bracelet = new Bracelet();
        $bracelet->setTag('bracelet');
        $bracelet->setTitle('metal');
        $bracelet->setDescription('');
        $bracelet->setImageName('metal1.jpeg');
        $bracelet->setPrix('100.00');
        $bracelet->setSlug('');
        $manager->persist($bracelet);

        $bracelet = new Bracelet();
        $bracelet->setTag('bracelet');
        $bracelet->setTitle('metal');
        $bracelet->setDescription('');
        $bracelet->setImageName('metal1.jpeg');
        $bracelet->setPrix('100.00');
        $bracelet->setSlug('');
        $manager->persist($bracelet);

        $bracelet = new Bracelet();
        $bracelet->setTag('bracelet');
        $bracelet->setTitle('Multicolor');
        $bracelet->setDescription('');
        $bracelet->setImageName('multi1.jpeg');
        $bracelet->setPrix('100.00');
        $bracelet->setSlug('');
        $manager->persist($bracelet);

        $bracelet = new Bracelet();
        $bracelet->setTag('bracelet');
        $bracelet->setTitle('violet');
        $bracelet->setDescription('');
        $bracelet->setImageName('violet1.jpeg');
        $bracelet->setPrix('100.00');
        $bracelet->setSlug('');
        $manager->persist($bracelet);

        

        $manager->flush();
    }
}
