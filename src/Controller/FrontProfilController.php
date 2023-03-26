<?php

namespace App\Controller;


use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class FrontProfilController extends AbstractController
{
    #[Route('/profil', name: 'app_front_profil')]
    public function index(Request $request, EntityManagerInterface $em, UserPasswordHasherInterface $userPasswordHasherInterface ): Response
    {
        //On récupère l'utilisateur connecté
        $user = $this->getUser();
        $form = $this->createForm(UserType::class, $user);
        //On hydrate le formulaire avec les données de la requête
        $form->handleRequest($request);
        //Si le formulaire est soumis et valide 
        if ($form->isSubmitted() && $form->isValid()){
        //On traite le plainPassword si necessaire 
        if ($form->get('plainPassword')->getData()) {
            $encodePassword=$userPasswordHasherInterface->hashPassword($user, $form->get('plainPassword')->getData ());
                $user->setPassword($encodePassword);
        }

            //On persiste l'entité
            $em->persist($user);
            //On flush 
            $em->flush();
            //On ajoute un message flash 
            $this->addFlash('Success', 'Votre profil a bien été mis à jour !');
            //On redirige vers la page de profil
            return $this->redirectToRoute('app_front_profil');

        }
        //
        return $this->render('front_profil/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
