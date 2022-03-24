<?php

namespace App\Controller;

use App\Entity\Message;
use App\Entity\Trick;
use App\Repository\MessageRepository;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
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
            'messages' => $messages
        ]);
    }

    /**
     * @Route("message_add/{id}", name="message_add")
     */
    public function add(Request $request, Trick $trick, EntityManagerInterface $em, SessionInterface $session)
    {
        $message = new Message();

        

            /**@var \App\Entity\User $user */
            $user = $this->getUser();
            $message->setAuthor($user);
            $message->setContent($request->request->get('message'));
            $message->setTrick($trick);
            $message->setCreatedAt(new DateTimeImmutable());

            $em->persist($message);
            $em->flush();


            $this->addFlash('success', "Votre commentaire a bien été ajouté !");


        $referer = $request->headers->get('referer');

        return $this->redirect($referer);
    }
}
