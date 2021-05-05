<?php

namespace App\Controller;
use App\Entity\Sneaker;
use App\Entity\LikeSneaker;
use App\Form\SneakerType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;

class SneakerController extends AbstractController
{
    /**
     * @Route("/sneaker", name="sneaker")
     *
     */
    public function index(): Response
    {
        $sneakers = $this->getDoctrine()->getRepository(Sneaker::class)->findAll();
        return $this->render('sneaker/index.html.twig', [
            'sneakers' => $sneakers,
        ]);
    }
    /**
     * @Route("/admin/add", name="admin_sneaker_add")
     */
    public function new(Request $request, EntityManagerInterface $em)
    {
        $product = new Sneaker();
        $form = $this->createForm(SneakerType::class, $product);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var UploadedFile $image */
            $image = $form['image']->getData();

            if ($image) {
                $originalFilename = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
                // this is needed to safely include the file name as part of the URL
                //$safeFilename = transliterator_transliterate('Any-Latin; Latin-ASCII; [^A-Za-z0-9_] remove; Lower()', $originalFilename);
                $newFilename = $originalFilename.'-'.uniqid().'.'.$image->guessExtension();

                // Move the file to the directory where brochures are stored
                try {
                    $image->move(
                        $this->getParameter('image_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }

                // updates the 'brochureFilename' property to store the PDF file name
                // instead of its contents
                $product->setImage($newFilename);
            }

            // ... persist the $product variable or any other work
            $em->persist($product);
            $em->flush();
            return $this->redirect($this->generateUrl('admin'));
        }

        return $this->render('admin/addSneaker.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/list/sneaker", name="sneaker.list") * @return Response
     */
    public function list(EntityManagerInterface $em) : Response
    {
        $sneakers = $this->getDoctrine()->getRepository(Sneaker::class)->findAll();
        return $this->render('Admin/listSneaker.html.twig', [
            'sneakers' => $sneakers, ]);
    }


}
