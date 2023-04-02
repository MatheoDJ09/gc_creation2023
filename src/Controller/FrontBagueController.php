<?php

namespace App\Controller;

use App\Repository\BagueRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FrontBagueController extends AbstractController
{
    #[Route('/', name: 'app_front')]
    #[Route('/bague', name: 'app_front_bague')]
    public function index(BagueRepository $BagueRepository): Response
    {
        $bagues = $BagueRepository->findAll();
        return $this->render('front_bague/index.html.twig', [
            'bagues' => $bagues,
            
        ]);
    }
}
