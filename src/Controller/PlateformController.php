<?php

namespace App\Controller;

use App\Entity\Plateform;
use App\Form\PlateformType;
use App\Repository\PlateformRepository;
use App\Repository\GamesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/plateform")
 */
class PlateformController extends AbstractController
{
    /**
     * @Route("/", name="plateform_index", methods={"GET"})
     */
    public function index(PlateformRepository $plateformRepository): Response
    {
        return $this->render('plateform/index.html.twig', [
            'plateforms' => $plateformRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="plateform_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $plateform = new Plateform();
        $form = $this->createForm(PlateformType::class, $plateform);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($plateform);
            $entityManager->flush();

            return $this->redirectToRoute('plateform_index');
        }

        return $this->render('plateform/new.html.twig', [
            'plateform' => $plateform,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="plateform_show", methods={"GET"})
     */
    public function show(Plateform $plateform): Response
    {
        return $this->render('plateform/show.html.twig', [
            'plateform' => $plateform,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="plateform_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Plateform $plateform): Response
    {
        $form = $this->createForm(PlateformType::class, $plateform);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('plateform_index');
        }

        return $this->render('plateform/edit.html.twig', [
            'plateform' => $plateform,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="plateform_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Plateform $plateform): Response
    {
        if ($this->isCsrfTokenValid('delete' . $plateform->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($plateform);
            $entityManager->flush();
        }

        return $this->redirectToRoute('plateform_index');
    }
}