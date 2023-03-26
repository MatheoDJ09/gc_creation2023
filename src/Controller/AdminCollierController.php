<?php

namespace App\Controller;

use App\Entity\Collier;
use App\Form\CollierType;
use App\Repository\CollierRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/collier')]
class AdminCollierController extends AbstractController
{
    #[Route('/', name: 'app_admin_collier_index', methods: ['GET'])]
    public function index(CollierRepository $collierRepository): Response
    {
        return $this->render('admin_collier/index.html.twig', [
            'colliers' => $collierRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_admin_collier_new', methods: ['GET', 'POST'])]
    public function new(Request $request, CollierRepository $collierRepository): Response
    {
        $collier = new Collier();
        $form = $this->createForm(CollierType::class, $collier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $collierRepository->save($collier, true);

            return $this->redirectToRoute('app_admin_collier_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_collier/new.html.twig', [
            'collier' => $collier,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_collier_show', methods: ['GET'])]
    public function show(Collier $collier): Response
    {
        return $this->render('admin_collier/show.html.twig', [
            'collier' => $collier,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_collier_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Collier $collier, CollierRepository $collierRepository): Response
    {
        $form = $this->createForm(CollierType::class, $collier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $collierRepository->save($collier, true);

            return $this->redirectToRoute('app_admin_collier_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_collier/edit.html.twig', [
            'collier' => $collier,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_collier_delete', methods: ['POST'])]
    public function delete(Request $request, Collier $collier, CollierRepository $collierRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$collier->getId(), $request->request->get('_token'))) {
            $collierRepository->remove($collier, true);
        }

        return $this->redirectToRoute('app_admin_collier_index', [], Response::HTTP_SEE_OTHER);
    }
}
