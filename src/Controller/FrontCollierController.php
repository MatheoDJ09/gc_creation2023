<?php

namespace App\Controller;

use App\Repository\CollierRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FrontCollierController extends AbstractController
{
    #[Route('/front/collier', name: 'app_front_collier')]
    public function index(CollierRepository $CollierRepository): Response
    {
        $colliers = $CollierRepository->findAll();
        return $this->render('front_collier/index.html.twig', [
            'colliers' => $colliers,
        ]);
    }
}
