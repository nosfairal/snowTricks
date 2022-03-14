<?php

namespace App\Controller;

use App\Entity\GroupTrick;
use App\Repository\GroupTrickRepository;
use Doctrine\Bundle\DoctrineBundle\Registry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GroupTrickController extends AbstractController
{

    public function __construct(GroupTrickRepository $repository)
    {
       $this->repository = $repository ;
    }
    
    /**
     * @Route("/group/trick", name="app_group_trick")
     */
    public function index(): Response
    {   
        $groups = $this->repository->findAll();
        return $this->render('group_trick/index.html.twig', [
            'controller_name' => 'GroupTrickController',
            'groups' => $groups
        ]);
    }
}
