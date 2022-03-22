<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Picture;
use App\Form\PictureType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/picture")
 */
class PictureController extends AbstractController
{
    /**
     * @Route("/picture", name="app_picture")
     */
    public function index(): Response
    {
        return $this->render('picture/index.html.twig', [
            'controller_name' => 'PictureController',
        ]);
    }

    /**
     * @Route("/nouveau", name="picture_new")
     */
    public function new(Request $request): Response
    {
        $picture = new Picture();
        $form = $this->createForm(PictureType::class, $picture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->processForm($form, $picture);

            $this->addFlash('success', 'The picture has been successfully added.');

            /*return $this->redirectToRoute('trick_show', [
                'group_slug' => $picture->getTrick()->getTrickGroup()->getSlug(),
                'slug' => $picture->getTrick()->getSlug()
            ]);*/
        }

        return $this->render('picture/new.html.twig', [
            'picture' => $picture,
            'form' => $form->createView()
        ]);
    }
}
