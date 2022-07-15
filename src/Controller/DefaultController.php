<?php

namespace App\Controller;

use App\Entity\Games;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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

    #[Route('/insert/game', name: 'insertgame')]
    public function insertGame(EntityManagerInterface $doctrine)
    {
        $game1 = new Games();
        $game1->setTitle('Lost Ark');
        $game1->setGameUrl('https://www.freetogame.com/open/lost-ark');
        $game1->setPlatform('PC (Windows)');
        $game1->setFreetogameProfileUrl('https://www.freetogame.com/lost-ark');
        $game1->setThumbnail('https://www.freetogame.com/g/517/thumbnail.jpg');

        $game2 = new Games();
        $game2->setTitle('Halo Infinite"');
        $game2->setGameUrl('https://www.freetogame.com/open/lost-ark');
        $game2->setPlatform('PC (Ubuntu)');
        $game2->setFreetogameProfileUrl('https://www.freetogame.com/lost-ark');
        $game2->setThumbnail('https://www.freetogame.com/g/515/thumbnail.jpg",');

        $doctrine->persist($game1);
        $doctrine->persist($game2);
        $doctrine->flush();
        return new Response('Juego insertado corectamente');
    }
}
