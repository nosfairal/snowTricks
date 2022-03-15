<?php

namespace App\Controller;

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
}
