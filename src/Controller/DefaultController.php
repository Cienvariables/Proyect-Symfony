<?php

namespace App\Controller;

use App\Entity\Games;
use App\Form\GamesType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function getGames(EntityManagerInterface $doctrine)
    {
        $repository = $doctrine->getRepository(Games::class);
        $games = $repository->findAll();
        return $this->render('juegos/homepage.html.twig', ["games" => $games]);
    }

    #[Route('/game/{id}', name: 'showgame')]
    public function getGame($id, EntityManagerInterface $doctrine)
    {
        $repository = $doctrine->getRepository(Games::class);
        $games = $repository->find($id);
        return $this->render('juegos/show.html.twig', ["games" => $games]);
    }

    #[Route('/new/game', name: 'newgame')]
    public function newGames(Request $request, EntityManagerInterface $doctrine)
    {
        $form = $this->createForm(GamesType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $game = $form->getData();
            $doctrine->persist($game);
            $doctrine->flush();
            $this->addFlash('exito', 'Insertado correcto');
            return $this->redirectToRoute('home');
        }
        return $this->renderForm('juegos/newgames.html.twig', ["gameForm" => $form]);
    }

    #[Route('/edit/game/{id}', name: 'editgame')]
    public function editGames(Request $request, EntityManagerInterface $doctrine, $id)
    {
        $repository = $doctrine->getRepository(Games::class);
        $games = $repository->find($id);

        $form = $this->createForm(GamesType::class, $games);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $game = $form->getData();
            $doctrine->persist($game);
            $doctrine->flush();
            $this->addFlash('exito', 'Insertado correcto');
            return $this->redirectToRoute('home');
        }
        return $this->renderForm('juegos/newgames.html.twig', ["gameForm" => $form]);
    }
}
