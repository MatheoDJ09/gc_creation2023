<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FrontCollierController extends AbstractController
{
    #[Route('/front/collier', name: 'app_front_collier')]
    public function index(): Response
    {
        return $this->render('front_collier/index.html.twig', [
            'controller_name' => 'FrontCollierController',
        ]);
    }
}
