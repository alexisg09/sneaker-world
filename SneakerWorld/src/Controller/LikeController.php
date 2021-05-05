<?php

namespace App\Controller;

use App\Entity\LikeSneaker;
use App\Repository\LikeSneakerRepository;
use Doctrine\DBAL\Types\IntegerType;
use phpDocumentor\Reflection\Types\Boolean;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Sneaker;
use Doctrine\ORM\EntityManagerInterface;

class LikeController extends AbstractController
{
    /**
     * @Route("/like", name="like")
     */
    public function index(): Response
    {
        return $this->render('like/index.html.twig', [
            'controller_name' => 'LikeController',
        ]);
    }

    /**
     * @Route("/add/{id}", name="add")
     */

    public function new(EntityManagerInterface $em, Sneaker $sneaker)
    {
        $likeSneakers = $sneaker->getLikeSneakers();
        $notexists = true;
        foreach($likeSneakers as $likeSneaker){
            if($likeSneaker->getIdUser()->getId() == $this->getUser()->getId()){
                $notexists = false;
            }
        }

        if($notexists) {
            $user = $this->getUser();
            $like = new LikeSneaker();
            $like->setIdUser($user);
            $em->persist($like);
            $sneaker->addLikeSneaker($like);
            $em->persist($sneaker);
            $em->flush();
            return $this->redirect($this->generateUrl('sneaker'));
        }
        return $this->redirect($this->generateUrl('sneaker'));
    }

    /**
     * @Route("/delete/{id}", name="delete")
     */

    public function delete(EntityManagerInterface $em, Sneaker $sneaker)
    {
            $user = $this->getUser()->getId();
            $like = $this->getDoctrine()->getRepository(LikeSneaker::class)->removeLike($user, $sneaker->getId());
            $sneaker->removeLikeSneaker($like[0]);
            $em->remove($like[0]);
            $em->flush();



        return $this->redirect($this->generateUrl('app_liste_sneaker_users'));
    }

}
