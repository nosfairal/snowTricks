<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\TrickRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    
    public function __construct(TrickRepository $repository)
    {
       $this->repository = $repository ;
    }
    /**
     * @Route("/accueil", name="home")
     */
    public function index(): Response
    {
        $tricks = $this->repository->findBy([], ['createdAt' => 'DESC'], 10, 0);
        $trickCount = $this->repository->count([]);
        return $this->render('main/index.html.twig', [
            'tricks' => $tricks,
            'trickCount' => $trickCount
        ]);
    }
}
