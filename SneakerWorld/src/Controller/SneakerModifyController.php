<?php

namespace App\Controller;

use App\Entity\Sneaker;
use App\Form\Sneaker1Type;
use App\Repository\SneakerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SneakerModifyController extends AbstractController
{


    /**
     * @Route("/new", name="sneaker_modify_new", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $sneaker = new Sneaker();
        $form = $this->createForm(Sneaker1Type::class, $sneaker);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($sneaker);
            $entityManager->flush();

            return $this->redirectToRoute('sneaker_modify_index');
        }

        return $this->render('sneaker_modify/new.html.twig', [
            'sneaker' => $sneaker,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="sneaker_modify_show", methods={"GET"})
     * @param Sneaker $sneaker
     * @return Response
     */
    public function show(Sneaker $sneaker): Response
    {
        return $this->redirectToRoute('sneaker.list');
    }

    /**
     * @Route("admin/list/sneaker/edit/{id}", name="sneaker_modify_edit", methods={"GET","POST"})
     * @param Request $request
     * @param Sneaker $sneaker
     * @return Response
     */
    public function edit(Request $request, Sneaker $sneaker): Response
    {
        $form = $this->createForm(Sneaker1Type::class, $sneaker);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('sneaker.list');
        }

        return $this->render('sneaker_modify/edit.html.twig', [
            'sneaker' => $sneaker,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="sneaker_modify_delete", methods={"POST"})
     * @param Request $request
     * @param Sneaker $sneaker
     * @return Response
     */
    public function delete(Request $request, Sneaker $sneaker): Response
    {
        if ($this->isCsrfTokenValid('delete' . $sneaker->getId(), $request->request->get('_token'))) {

            $entityManager = $this->getDoctrine()->getManager();
            foreach ($sneaker->getCommentSneaker() as $comment) {
                $entityManager->remove($comment);
            }
            foreach ($sneaker->getlikeSneakers() as $like) {
                $entityManager->remove($like);
            }
            $entityManager->remove($sneaker);
            $entityManager->flush();
        }

        return $this->redirectToRoute('sneaker.list');
    }
}
