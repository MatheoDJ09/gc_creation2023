<?php

namespace App\Controller;

use App\Repository\BraceletRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FrontBraceletController extends AbstractController
{
    #[Route('/front/bracelet', name: 'app_front_bracelet')]
    public function index(BraceletRepository $BagueRepository): Response
    {
        $bracelets = $BagueRepository->findAll();
        return $this->render('front_bracelet/index.html.twig', [
            'bracelets' => $bracelets,
        ]);
    }
}
