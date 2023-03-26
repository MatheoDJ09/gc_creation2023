<?php

namespace App\Controller;

use App\Entity\Bracelet;
use App\Form\BraceletType;
use App\Repository\BraceletRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/bracelet')]
class AdminBraceletController extends AbstractController
{
    #[Route('/', name: 'app_admin_bracelet_index', methods: ['GET'])]
    public function index(BraceletRepository $braceletRepository): Response
    {
        return $this->render('admin_bracelet/index.html.twig', [
            'bracelets' => $braceletRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_admin_bracelet_new', methods: ['GET', 'POST'])]
    public function new(Request $request, BraceletRepository $braceletRepository): Response
    {
        $bracelet = new Bracelet();
        $form = $this->createForm(BraceletType::class, $bracelet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $braceletRepository->save($bracelet, true);

            return $this->redirectToRoute('app_admin_bracelet_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_bracelet/new.html.twig', [
            'bracelet' => $bracelet,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_bracelet_show', methods: ['GET'])]
    public function show(Bracelet $bracelet): Response
    {
        return $this->render('admin_bracelet/show.html.twig', [
            'bracelet' => $bracelet,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_bracelet_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Bracelet $bracelet, BraceletRepository $braceletRepository): Response
    {
        $form = $this->createForm(BraceletType::class, $bracelet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $braceletRepository->save($bracelet, true);

            return $this->redirectToRoute('app_admin_bracelet_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_bracelet/edit.html.twig', [
            'bracelet' => $bracelet,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_bracelet_delete', methods: ['POST'])]
    public function delete(Request $request, Bracelet $bracelet, BraceletRepository $braceletRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$bracelet->getId(), $request->request->get('_token'))) {
            $braceletRepository->remove($bracelet, true);
        }

        return $this->redirectToRoute('app_admin_bracelet_index', [], Response::HTTP_SEE_OTHER);
    }
}
