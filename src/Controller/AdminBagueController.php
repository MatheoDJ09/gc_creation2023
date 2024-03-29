<?php

namespace App\Controller;

use App\Entity\Bague;
use App\Form\BagueType;
use App\Repository\BagueRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/admin/bague')]
class AdminBagueController extends AbstractController
{
    #[Route('/', name: 'app_admin_bague_index', methods: ['GET'])]
    public function index(BagueRepository $bagueRepository): Response
    {
        return $this->render('admin_bague/index.html.twig', [
            'bagues' => $bagueRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_admin_bague_new', methods: ['GET', 'POST'])]
    public function new(Request $request, BagueRepository $bagueRepository, SluggerInterface $sluggerInterface): Response
    {
        $bague = new Bague();
        $form = $this->createForm(BagueType::class, $bague);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $bague->setSlug($sluggerInterface->slug(\strtolower($bague->getTitle())));
            $bagueRepository->save($bague, true);
            /* FLASH MESSAGE */
// ====================================================== //
$this->addFlash('success', 'Votre Bague a été Sauvegarder !');
// ====================================================== //
            
            return $this->redirectToRoute('app_admin_bague_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_bague/new.html.twig', [
            'bague' => $bagues,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_bague_show', methods: ['GET'])]
    public function show(Bague $bague): Response
    {
        return $this->render('admin_bague/show.html.twig', [
            'bague' => $bagues,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_bague_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Bague $bague, BagueRepository $bagueRepository): Response
    {
        $form = $this->createForm(BagueType::class, $bague);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $bagueRepository->save($bague, true);
            /* FLASH MESSAGE */
// ====================================================== //
$this->addFlash('success', 'Votre Bague a été Modifier !');
// ====================================================== //

            return $this->redirectToRoute('app_admin_bague_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_bague/edit.html.twig', [
            'bague' => $bagues,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_bague_delete', methods: ['POST'])]
    public function delete(Request $request, Bague $bague, BagueRepository $bagueRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$bague->getId(), $request->request->get('_token'))) {
            $bagueRepository->remove($bague, true);
        }
            /* FLASH MESSAGE */
// ====================================================== //
        $this->addFlash('success', 'Votre Bague a été supprimer !');
// ====================================================== //

        return $this->redirectToRoute('app_admin_bague_index', [], Response::HTTP_SEE_OTHER);
    }
}  

// ====================================================== //
// ====================================================== //
// ====================================================== //