<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/user")
 */
class UserController extends AbstractController
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @Route("/index", name="app_user")
     */
    public function index(): Response
    {
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    /**
     * @Route("/admin", name="user_admin")
     * @IsGranted("ROLE_ADMIN", message="Vous devez être authentifié.e en tant qu'admin pour avoir accès à cette page")
     */
    public function adminIndex(): Response
    {
        return $this->render('admin/user/index.html.twig', [
            'users' => $this->userRepository->findAll(),
        ]);
    }

    /**
     * @Route("/{id}", name="delete-user", methods={"POST"})
     * @IsGranted("ROLE_ADMIN", message="Vous devez être authentifié.e en tant qu'admin pour supprimer un membre")
     */
    public function delete(Request $request, User $user): Response
    {
        if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->get('_token'))) {
            $this->userRepository->remove($user);
            $this->addFlash('success', 'Le membre a bien été supprimé');
        }

        // Generate URL + redirection
        $referer = $request->headers->get('referer');

        return $this->redirect($referer);
    }
}
