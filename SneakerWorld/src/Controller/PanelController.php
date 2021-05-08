<?php

namespace App\Controller;

use App\Entity\Sneaker;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PanelController extends AbstractController
{
    /**
     * @Route("/panel", name="panel")
     */
    public function index(): Response
    {
        $sneakers = $this->getDoctrine()->getRepository(Sneaker::class)->findAll();
        return $this->render('panel/index.html.twig', [
            'sneakers' => $sneakers,
        ]);
    }


}
