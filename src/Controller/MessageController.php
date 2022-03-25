<?php

namespace App\Controller;

use App\Entity\Message;
use App\Entity\Trick;
use App\Repository\MessageRepository;
use App\Repository\TrickRepository;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
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
     * @IsGranted("ROLE_USER", message="Vous devez être authentifié pour pouvoir ajouter un commentaire")
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

            $message->messageRepository->add();


            $this->addFlash('success', "Votre commentaire a bien été ajouté !");


        $referer = $request->headers->get('referer');

        return $this->redirect($referer);
    }

    /**
     * @Route("/message/trick/{slug}", name="list-message")
     */
    public function show($slug, TrickRepository $trickRepository, MessageRepository $messageRepository)
    {
        $trick = $trickRepository->findOneBy([
            'slug' => $slug
        ]);

        $trickSlug = $trick->getSlug();


        $messages = $messageRepository->findByTrick($trickSlug, ['createdAt' => 'DESC'], 5, 0);

        $messageCount = $messageRepository->count([]);

        /** @var \App\Entity\User $user */
        $user = $this->getUser();



        return $this->render('message/list-message.html.twig', [
            'trick' => $trick,
            'user' => $user,
            'messages' => $messages,
            'messageCount' => $messageCount
        ]);
    }


}
