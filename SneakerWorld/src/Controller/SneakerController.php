<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SneakerController extends AbstractController
{
    /**
     * @Route("/sneaker", name="sneaker")
     */
    public function index(): Response
    {
        return $this->render('sneaker/index.html.twig', [
            'controller_name' => 'SneakerController',
        ]);
    }
}
