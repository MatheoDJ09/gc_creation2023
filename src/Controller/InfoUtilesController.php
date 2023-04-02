<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InfoUtilesController extends AbstractController
{
    #[Route('/info/utiles', name: 'app_info_utiles')]
    public function index(): Response
    {
        return $this->render('info_utiles/index.html.twig', [
            'image' => '/images/extra/boutique.jpg',

        ]);
    }
}
