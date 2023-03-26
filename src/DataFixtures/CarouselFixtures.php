<?php

namespace App\DataFixtures;

use App\Entity\Carousel;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class CarouselFixtures extends Fixture
{
        public function load(ObjectManager $manager): void
        {
        $carousel = new Carousel(); // IMAGES CAROUSELS
        $carousel->setTag('home');
        $carousel->setImageName('portada.jpg');
        $manager->persist($carousel);

        $carousel = new Carousel();
        $carousel->setTag('home');
        $carousel->setImageName('bague-leo.jpeg');
        $manager->persist($carousel);

        $carousel = new Carousel();
        $carousel->setTag('home');
        $carousel->setImageName('bague-verde.jpeg');
        $manager->persist($carousel);

        $carousel = new Carousel();
        $carousel->setTag('home');
        $carousel->setImageName('bracelet-esmeraldas.jpeg');

        $manager->persist($carousel);

        $manager->flush();
        }
}
