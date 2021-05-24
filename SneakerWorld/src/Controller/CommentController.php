<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Form\CommentType;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\CommentSneaker;
use App\Entity\Sneaker;

class CommentController extends AbstractController
{

    /**
     * @Route("{_locale}/commentAdd{id}", name="comment.sneaker")
     * @param Request $request
     * @param Sneaker $sneaker
     * @param EntityManagerInterface $em
     * @return Response
     */
    public function getComment(Sneaker $sneaker, Request $request, EntityManagerInterface $em ): Response
    {
        $comments = $sneaker->getCommentSneaker();
        $comment = new CommentSneaker();
        $form = $this->createForm(CommentType::class, $comment);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $comment->setIdUser($this->getUser());
            $comment->setPrenom($this->getUser()->getPrenom());
            $comment->setIdSneaker($sneaker);
            $em->persist($comment);
            $em->flush();
            return $this->redirect($this->generateUrl('sneaker'));
        }
        return $this->render('comment/index.html.twig', [
            'comments' => $comments,
            'sneaker' => $sneaker,
            'form' => $form->createView(),
        ]);
    }
}
