<?php

namespace App\Controller;

use App\Entity\Troop;
use App\Form\TroopType;
use App\Repository\TroopRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/troop")
 */
class AdminTroopController extends AbstractController
{
    /**
     * @Route("/", name="troop_index", methods={"GET"})
     */
    public function index(TroopRepository $troopRepository): Response
    {
        return $this->render('troop/index.html.twig', [
            'troops' => $troopRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="troop_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $troop = new Troop();
        $form = $this->createForm(TroopType::class, $troop);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($troop);
            $entityManager->flush();

            return $this->redirectToRoute('troop_index');
        }

        return $this->render('troop/new.html.twig', [
            'troop' => $troop,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="troop_show", methods={"GET"})
     */
    public function show(Troop $troop): Response
    {
        return $this->render('troop/show.html.twig', [
            'troop' => $troop,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="troop_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Troop $troop): Response
    {
        $form = $this->createForm(TroopType::class, $troop);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('troop_index');
        }

        return $this->render('troop/edit.html.twig', [
            'troop' => $troop,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="troop_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Troop $troop): Response
    {
        if ($this->isCsrfTokenValid('delete'.$troop->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($troop);
            $entityManager->flush();
        }

        return $this->redirectToRoute('troop_index');
    }
}
