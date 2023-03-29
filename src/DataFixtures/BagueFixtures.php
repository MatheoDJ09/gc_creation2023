<?php

namespace App\DataFixtures;

use App\Entity\Bague;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class BagueFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $bague = new Bague();
        $bague->setTag('bague');
        $bague->setTitle('Leopard');
        $bague->setDescription('');
        $bague->setImageName('leo1.jpeg');
        $bague->setPrix('50.00');
        $bague->setSlug('leopard');
        $manager->persist($bague);

        $bague = new Bague();
        $bague->setTag('bague');
        $bague->setTitle('Bague triple ');
        $bague->setDescription('');
        $bague->setImageName('jeanne1.jpeg');
        $bague->setPrix('50.00');
        $bague->setSlug('bague-triple');
        $manager->persist($bague);

        $bague = new Bague();
        $bague->setTag('bague');
        $bague->setTitle('Tete de Mort');
        $bague->setDescription('');
        $bague->setImageName('dead1.jpeg');
        $bague->setPrix('50.00');
        $bague->setSlug('tete-de-mort');
        $manager->persist($bague);

        $bague = new Bague();
        $bague->setTag('bague');
        $bague->setTitle('Bague Esmeralda');
        $bague->setDescription('');
        $bague->setImageName('verde1.jpeg');
        $bague->setPrix('50.00');
        $bague->setSlug('bague-esmeralda');
        $manager->persist($bague);

        $bague = new Bague();
        $bague->setTag('bague');
        $bague->setTitle('Bague Diamonds');
        $bague->setDescription('');
        $bague->setImageName('ring1.jpeg');
        $bague->setPrix('50.00');
        $bague->setSlug('bague-diamonds');
        $manager->persist($bague);

        $bague = new Bague();
        $bague->setTag('bague');
        $bague->setTitle('Leopard');
        $bague->setDescription('');
        $bague->setImageName('leo1.jpeg');
        $bague->setPrix('50.00');
        $bague->setSlug('leopard');
        $manager->persist($bague);

        $manager->flush();
    }
}
