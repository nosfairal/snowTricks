<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Picture;
use App\Form\PictureType;
use App\Repository\PictureRepository;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/picture")
 */
class PictureController extends AbstractController
{
    protected $pictureRepository;
    protected $entityManager;

    public function __construct(
        PictureRepository $pictureRepository,
        EntityManagerInterface $entityManager
    ) {
        $this->pictureRepository = $pictureRepository;
        $this->entityManager = $entityManager;
    }

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
     * @IsGranted("ROLE_USER", message="Vous devez être authentifié pour pouvoir ajouter une image")
     */
    public function new(Request $request): Response
    {
        $picture = new Picture();
        $form = $this->createForm(PictureType::class, $picture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
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

    /**
     * @Route("/{id}/edit", name="picture-edit", methods={"GET","POST"})
     * @IsGranted("ROLE_USER", message="Vous devez être authentifié pour modifier une image")
     */
    public function edit(Request $request, Picture $picture): Response
    {
        $form = $this->createForm(PictureType::class, $picture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            /** @var UploadedFile $pictureFile */
            $pictureFile = $form->get('filename')->getData();
            $pictureFileName = uniqid() . '.' . $pictureFile->guessExtension();
            // Copy file in uploads/pictures
            $pictureFile->move(
                $this->getParameter('pictures_directory'),
                $pictureFileName
            );
            $picture->setFilename($pictureFileName);
            $this->entityManager->persist($picture);
            $this->entityManager->flush();
            $this->addFlash('success', "L'image a bien été modifiée.");

            return $this->redirectToRoute('edit-trick', [
                'slug' => $picture->getTrick()->getSlug()
            ]);
        }

        return $this->render('picture/edit.html.twig', [
            'picture' => $picture,
            'form' => $form->createView()
        ]);
    }

}
