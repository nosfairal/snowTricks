<?php

namespace App\Controller;

use App\Repository\GroupTrickRepository;
use App\Repository\MessageRepository;
use App\Repository\PictureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use App\Repository\TrickRepository;
use App\Repository\UserRepository;
use App\Repository\VideoRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{   
    protected $messageRepository;
    protected $userRepository;
    protected $groupRepository;
    protected $pictureRepository;
    protected $videoRepository;
    protected $trickRepository;
    
    public function __construct(TrickRepository $trickRepository, MessageRepository $messageRepository, UserRepository $userRepository,GroupTrickRepository $groupRepository, PictureRepository $pictureRepository, VideoRepository $videoRepository)
    {
        $this->trickRepository = $trickRepository;
        $this->messageRepository = $messageRepository;
        $this->userRepository = $userRepository;
        $this->groupRepository = $groupRepository;
        $this->pictureRepository = $pictureRepository;
        $this->videoRepository = $videoRepository;
    }
    /**
     * @Route("/accueil", name="home")
     */
    public function index(): Response
    {
        $tricks = $this->trickRepository->findBy([], ['createdAt' => 'DESC'], 10, 0);
        $trickCount = $this->trickRepository->count([]);
        return $this->render('main/index.html.twig', [
            'tricks' => $tricks,
            'trickCount' => $trickCount
        ]);
    }

    /**
     * @Route("/admin", name="admin_home"))
     * @IsGranted("ROLE_ADMIN", message="Vous devez être authentifié.e en tant qu'admin pour avoir accès à cette page")
     */
    public function admin()
    {
        return $this->render('admin/home.html.twig', [
            'tricks' => $this->trickRepository->findAll(),
            'messages' => $this->messageRepository->findAll(),
            'users' => $this->userRepository->findBy(['isVerified' => 1]),
            'groups' => $this->groupRepository->findAll(),
            'pictures' => $this->pictureRepository->findAll(),
            'videos' => $this->videoRepository->findAll()
        ]);
    }
}
