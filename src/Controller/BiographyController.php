<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BiographyController extends AbstractController
{
    #[Route('/biography', name: 'app_biography')]
    public function index(): Response
    {
        return $this->render('biography/index.html.twig', [
            'image' => '/images/extra/gian.jpg',
            'description' => "La boutique GC Création, située dans le Marais, 16 rue Ferdinand Duval, 
            vous garantit de belles surprises ! Ouverte par Gian Carlo Moscoso, 
            le plus français des créateurs colombiens, ultra sympathique, s'est installé fin 2012 à cette jolie adresse. 
            Une passion assouvie après 20 ans d'expérience dans le secteur de la création artistique, 
            tout d'abord photographique puis durant 9 ans au sein d'une maison haute couture. 
            Une fascination jamais démentie pour l'esthétique, la mode et l'élégance à la française ! 
            GC Création vous propose une large collection de bijoux et accessoires de mode destinés aux femmes et aux hommes. 
            Sa marque de créateur GC Création propose notamment des accessoires uniques : bagues, bracelets, colliers... 
            mais aussi des bijoux avec des pierres semi-précieuses ou précieuses, 
            et des accessoires en acrylique pour la maison comme des lampes avec des morceaux de cuir par exemple.
            
            La touche GC Création c'est donc l'amour de mix de belles matières, 
            à partir duquel le créateur aime mélanger l'acrylique à des matières nobles comme le cuir et l'argent. 
            Très intéressé par la décoration, il visite régulièrement le salon Maison et Objet où il constate que l'acrylique est omniprésent. 
            Aussi, lors d'un séjour en Colombie, il crée une collection de vases 
            dont l'originalité est de marier ce matériau avec des produits nobles comme le cuir, 
            l'argent ou les pierres semi précieuses. 
            Gian Carlo décline une collection de sacs et de bracelets dont la singularité est 
            l'incrustation de tissu à l'intérieur de feuilles d'acrylique. 
            Ces premières créations lui mettent le pied à l'étrier et lui permettent de découvrir que 
            la matière première acrylique offre une multitude d'ouvertures créatives. 
            GC Création réalise ses créations en peu d'exemplaires (quatre pour les bracelets), 
            voire il ne confectionne que des pièces uniques. Les créations de Gian Carlo vous offriront 
            originalité et personnalisation. ! Les prix sont très variés. À ne pas manquer ! Impossible de résister !."

        ]);
    }
}