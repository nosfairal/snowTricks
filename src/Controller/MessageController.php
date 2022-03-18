<?php

namespace App\Controller;

use App\Repository\MessageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MessageController extends AbstractController
{
    public function __construct(MessageRepository $repository)
    {
       $this->repository = $repository ;
    }

    /**
     * @Route("/admin/message", name="app_message")
     */
    public function index(): Response
    {
        $messages = $this->repository->findAll();
        return $this->render('message/index.html.twig', [
            'controller_name' => 'MessageController',
            'messages' => $messages
        ]);
    }
}
