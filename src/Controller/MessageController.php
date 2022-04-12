<?php

namespace App\Controller;

use App\Entity\Message;
use App\Entity\Trick;
use App\Repository\MessageRepository;
use App\Repository\TrickRepository;
use App\Service\PaginationService;
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
    public function __construct(MessageRepository $repository, PaginationService $pagination)
    {
       $this->repository = $repository ;
       $this->pagination = $pagination ;
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

            $message->repository->add();


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



        return $this->render('message/index.html.twig', [
            'trick' => $trick,
            'user' => $user,
            'messages' => $messages,
            'messageCount' => $messageCount
        ]);
    }


    /**
     * @Route("/load-message/{id}/{start}", name="load-message")
     */
    public function load_message($id=0, Request $request, MessageRepository $mr, $start = 5)
    {            
        if ($request->isXmlHttpRequest()) {

            $messages = $mr->findByTrick($id, ['createdAt' => 'DESC'], 5, $start);
 
            return $this->render('message/list-message.html.twig', [
                'messages' => $messages
            ]);
            //return new Response();
            
        }
        /*$trickId = $trick->getId();
        //\dd($trickId);
        $messages = $mr->findByTrick($trickId, ['createdAt' => 'DESC'], 5, $start);
        $count = 5;
        $messagesTot = $mr->findByTrick($trick);
        $messageCount = count($messagesTot);
        //\dd($messages);
        return $this->render('trick/show-trick.html.twig', [
            'messages' => $messages,
            'count' => $count,
            'trick' => $trick,
            'messageCount' => $messageCount
        ]);*/
    }


}
