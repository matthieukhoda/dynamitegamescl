<?php

namespace App\Controller;

use App\Entity\Games;
use App\Form\GamesType;
use App\Repository\CategoryRepository;
use App\Repository\GamesRepository;
use App\Repository\PlateformRepository;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;

/**
 * @Route("/front")
 */
class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="front_index", methods={"GET"})
     */
    public function index(Request $request, PaginatorInterface $paginator, GamesRepository $gamesRepository, CategoryRepository $categoryRepository, PlateformRepository $plateformRepository): Response
    {
        $games = $gamesRepository->findAll();
        $gamepage = $paginator->paginate(
            $games, // Requête contenant les données à paginer (ici nos articles)
            $request->query->getInt('page', 1), // Numéro de la page en cours, passé dans l'URL, 1 si aucune page
            6 // Nombre de résultats par page
        );

        return $this->render('front/index.html.twig',  [
            'gamepage' => $gamepage,
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
            $game->setUpdatedAt(new DateTime());
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
     * @Route("/{id}", name="front_vue", methods={"GET"})
     */
    public function show(Games $game): Response
    {
        return $this->render('front/vue.html.twig', [
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
            $game->setUpdatedAt(new DateTime());
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