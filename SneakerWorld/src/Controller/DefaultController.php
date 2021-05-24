<?php

namespace App\Controller;

use App\Entity\Sneaker;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/default/{_locale}", name="default")
     */
    public function index(): Response
    {
        $sneakers = $this->getDoctrine()->getRepository(Sneaker::class)->findAll();
        return $this->render('panel/index.html.twig', [
            'sneakers' => $sneakers,
        ]);
    }
}
