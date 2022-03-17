<?php

namespace App\Controller;

use App\Entity\Trick;
use App\Repository\TrickRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TrickController extends AbstractController
{

    public function __construct(TrickRepository $repository)
    {
       $this->repository = $repository ;
    }

    /**
     * @Route("/trick", name="app_trick")
     */
    public function index(): Response
    {   
        $tricks = $this->repository->findAll();
        return $this->render('trick/index.html.twig', [
            'controller_name' => 'TrickController',
            'tricks' => $tricks
        ]);
    }

    /**
     * @Route("/trick-details/{slug}", name="show-trick")
     */
    public function show(Trick $trick): Response
    {   
        return $this->render('trick/show-trick.html.twig', [
            'trick' => $trick,
            'slug' => $trick->getSlug()
        ]);
    }

    
}
