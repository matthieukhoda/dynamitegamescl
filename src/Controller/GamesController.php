<?php

namespace App\Controller;

use App\Entity\Games;
use App\Form\GamesType;
use App\Repository\CategoryRepository;
use App\Repository\GamesRepository;
use App\Repository\PlateformRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/games")
 */
class GamesController extends AbstractController
{
    /**
     * @Route("/", name="games_index", methods={"GET"})
     */
    public function index(GamesRepository $gamesRepository, CategoryRepository $categoryRepository, PlateformRepository $plateformRepository): Response
    {
        $games = $gamesRepository->findAll();
        
        return $this->render('games/index.html.twig',  [
            'games' => $games,

        ]);
    }

    /**
     * @Route("/new", name="games_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $game = new Games();
        $form = $this->createForm(GamesType::class, $game);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($game);
            $entityManager->flush();

            return $this->redirectToRoute('games_index');
        }

        return $this->render('games/new.html.twig', [
            'game' => $game,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="games_show", methods={"GET"})
     */
    public function show(Games $game): Response
    {
        return $this->render('games/show.html.twig', [
            'game' => $game,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="games_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Games $game): Response
    {
        $form = $this->createForm(GamesType::class, $game);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('games_index');
        }

        return $this->render('games/edit.html.twig', [
            'game' => $game,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="games_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Games $game): Response
    {
        if ($this->isCsrfTokenValid('delete' . $game->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($game);
            $entityManager->flush();
        }

        return $this->redirectToRoute('games_index');
    }
}