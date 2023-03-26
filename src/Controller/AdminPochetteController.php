<?php

namespace App\Controller;

use App\Entity\Pochette;
use App\Form\PochetteType;
use App\Repository\PochetteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/pochette')]
class AdminPochetteController extends AbstractController
{
    #[Route('/', name: 'app_admin_pochette_index', methods: ['GET'])]
    public function index(PochetteRepository $pochetteRepository): Response
    {
        return $this->render('admin_pochette/index.html.twig', [
            'pochettes' => $pochetteRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_admin_pochette_new', methods: ['GET', 'POST'])]
    public function new(Request $request, PochetteRepository $pochetteRepository): Response
    {
        $pochette = new Pochette();
        $form = $this->createForm(PochetteType::class, $pochette);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $pochetteRepository->save($pochette, true);

            return $this->redirectToRoute('app_admin_pochette_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_pochette/new.html.twig', [
            'pochette' => $pochette,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_pochette_show', methods: ['GET'])]
    public function show(Pochette $pochette): Response
    {
        return $this->render('admin_pochette/show.html.twig', [
            'pochette' => $pochette,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_pochette_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Pochette $pochette, PochetteRepository $pochetteRepository): Response
    {
        $form = $this->createForm(PochetteType::class, $pochette);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $pochetteRepository->save($pochette, true);

            return $this->redirectToRoute('app_admin_pochette_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_pochette/edit.html.twig', [
            'pochette' => $pochette,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_pochette_delete', methods: ['POST'])]
    public function delete(Request $request, Pochette $pochette, PochetteRepository $pochetteRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$pochette->getId(), $request->request->get('_token'))) {
            $pochetteRepository->remove($pochette, true);
        }

        return $this->redirectToRoute('app_admin_pochette_index', [], Response::HTTP_SEE_OTHER);
    }
}
