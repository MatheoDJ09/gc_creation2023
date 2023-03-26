<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FrontBraceletController extends AbstractController
{
    #[Route('/front/bracelet', name: 'app_front_bracelet')]
    public function index(): Response
    {
        return $this->render('front_bracelet/index.html.twig', [
            'controller_name' => 'FrontBraceletController',
        ]);
    }
}
