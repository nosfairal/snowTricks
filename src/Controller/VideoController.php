<?php

namespace App\Controller;

use App\Entity\Video;
use App\Form\VideoType;
use App\Repository\VideoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VideoController extends AbstractController
{
    protected $videoRepository;
    protected $entityManager;

    public function __construct(
        VideoRepository $videoRepository,
        EntityManagerInterface $entityManager
    ) {
        $this->videoRepository = $videoRepository;
        $this->entityManager = $entityManager;
    }
    /**
     * @Route("/video", name="app_video")
     */
    public function index(): Response
    {
        return $this->render('video/index.html.twig', [
            'controller_name' => 'VideoController',
        ]);
    }

    /**
     * @Route("/video/{id}/modifier", name="video-edit")
     */

    public function edit(Request $request, Video $video):Response
    {
        $form = $this->createForm(VideoType::class, $video);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($video);
            $this->entityManager->flush();
            $this->addFlash('success', "La video a bien été modifiée.");

            return $this->redirectToRoute('edit-trick', [
                'slug' => $video->getTrick()->getSlug()
            ]);
        }

        return $this->render('video/edit-video.html.twig', [
            'video' => $video,
            'form' => $form->createView()
        ]);

    }

    /**
     * @Route("/effacerVideo/{id}", name="delete-video")
     * @IsGranted("ROLE_USER", message="Vous devez être authentifié pour pouvoir effacer une vidéo")
     */
    public function delete(Request $request, Video $video, $id)
    {
        if ($this->isCsrfTokenValid('delete'.$video->getId(), $request->get('_token'))) {
            $this->videoRepository->remove($video);
            $this->addFlash('success', 'Vidéo supprimée avec succès');
        }
        
        // Generate URL + redirection
        $referer = $request->headers->get('referer');

        return $this->redirect($referer);
    }
}
