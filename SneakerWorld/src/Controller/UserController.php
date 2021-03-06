<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\User;
use App\Entity\Sneaker;
use App\Form\UserType;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class UserController extends AbstractController
{
    /**
     * Créer un nouveau user.
     * @Route("{_locale}/panel/ajouterUser", name="ajouterUser")
     * @param UserPasswordEncoderInterface $encoder
     * @param Request $request
     * @param EntityManagerInterface $em
     * @return Response
     */
    public function create(UserPasswordEncoderInterface $encoder, Request $request, EntityManagerInterface $em) : Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $plainPassword = $user->getPassword();
            $encoded = $encoder->encodePassword($user, $plainPassword);
            $user->setPassword($encoded);
            $em->persist($user);
            $em->flush();
            return $this->redirectToRoute('panel');
        }
        return $this->render('user/index.html.twig', [
            'form' => $form->createView(), ]);
    }

    /**
     * @Route("{_locale}/admin/list", name="user.list") * @return Response
     */
    public function list() : Response
    {
        $users = $this->getDoctrine()->getRepository(User::class)->findAll();
        return $this->render('Admin/listUser.html.twig', [
            'users' => $users, ]);
    }

    /**
     * @Route("{_locale}/sneaker/user/liste", name="app_liste_sneaker_users") * @return Response
     */

    public function liste() : Response
    {
        $sneakers = $this->getDoctrine()->getRepository(Sneaker::class)->findAll();
        $sneakerLike = [];
        foreach($sneakers as $sneaker ){
            $likes = $sneaker->getLikeSneakers();
            foreach($likes as $like){
                if($like->getIdUser()->getId() == $this->getUser()->getId()){
                    $sneakerLike[] = $sneaker;
                }
            }
        }
        return $this->render('User/listeSneakerUser.html.twig', [
            'sneakerLike' => $sneakerLike, ]);
    }




}
