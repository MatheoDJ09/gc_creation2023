<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FrontBagueController extends AbstractController
{
    #[Route('/', name: 'app_front')]
    #[Route('/bague', name: 'app_front_bague')]
    public function index(): Response
    {
        return $this->render('front_bague/index.html.twig', [
            'controller_name' => 'FrontBagueLController',
            
        ]);
    }
}
