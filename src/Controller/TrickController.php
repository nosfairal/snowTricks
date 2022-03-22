<?php

namespace App\Controller;

use App\Entity\Trick;
use App\Entity\Picture;
use App\Entity\Video;
use App\Form\TrickType;
use App\Form\PictureType;
use App\Repository\TrickRepository;
use DateTimeImmutable;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBag;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

/**
 * @Route("/trick")
 */
class TrickController extends AbstractController
{

    public function __construct(TrickRepository $repository)
    {
       $this->repository = $repository ;
    }

    /**
     * @Route("/trick", name="app_trick")
     */
    public function index(): Response
    {   
        $tricks = $this->repository->findAll();
        return $this->render('trick/index.html.twig', [
            'controller_name' => 'TrickController',
            'tricks' => $tricks
        ]);
    }

    /**
     * @Route("/trick-details/{slug}", name="show-trick")
     */
    public function show(Trick $trick): Response
    {   
        return $this->render('trick/show-trick.html.twig', [
            'trick' => $trick,
            'slug' => $trick->getSlug()
        ]);
    }

    /**
     * @Route("/nouveau", name="new-trick")
     */
    public function new(Request $request, SluggerInterface $slugger, EntityManagerInterface $em, SessionInterface $session)
    {

        /** @var \App\Entity\User $user */
        $user = $this->getUser();

        $trick = new Trick();

        // Construction of form with TrickType
        $form = $this->createForm(TrickType::class, $trick);

        // Gestion de la saisie du formulaire
        $form->handleRequest($request);

        // Verify validity of form
        if ($form->isSubmitted() && $form->isValid()) {


            $trick->setSlug(strtolower($slugger->slug($trick->getName())));

            /**@var \App\Entity\User $user */
            $user = $this->getUser();

            $trick->setAuthor($user);

            $trick->setCreatedAt(new DateTimeImmutable());


            $pictureForms = $form->get('pictures');

            $pictureFileCount = 1;

            foreach ($pictureForms as $pictureForm) {


                /** @var UploadedFile $pictureFile */
                $pictureFile = $pictureForm->get('filename')->getData();
                $pictureFileName = uniqid() . '.' . $pictureFile->guessExtension();

                $picture = $pictureForm->getData();
                // Copy file in uploads/pictures
                $pictureFile->move(
                    $this->getParameter('pictures_directory'),
                    $pictureFileName
                );

                $trickPicture = new picture();
                $trickPicture->setFilename($pictureFileName);
                $trick->addPicture($trickPicture);
                $trickPicture->setTitle($picture->getTitle());
                $trickPicture->setDescription($picture->getDescription());
                $trickPicture->setTrick($trick);
                //$trickPicture->setDisplayOrder($pictureFileCount++);
                $em->persist($trickPicture);
            }

            $videos = $form->get('videos')->getData();

            foreach ($videos as $video) {
                $trickVideo = new Video();
                $trickVideo->setVideoUrl($video->getVideoUrl());
                $trickVideo->setTitle($video->getTitle());
                $trickVideo->setTrick($trick);
                $em->persist($trickVideo);
            }
            // Prepare data and recording
            $em->persist($trick);
            $em->flush();

            /** @var FlashBag */
            $flashBag = $session->getBag('flashes');

            $flashBag->add('success', "Le trick a bien été créé !");

            // Generate URL + redirection
            return $this->redirectToRoute('home');
        }


        // Creation of the form
        $formView = $form->createView();

        return $this->render('trick/new.html.twig', [
            'form' => $formView,
            'user' => $user
        ]);
    }

    /**
     * @Route("/effacerTrick/{id}", name="delete-trick")
     */
    public function delete($id)
    {
        $trick = $this->repository->find($id);
        $this->repository->remove($trick);
        // Generate URL + redirection
        return $this->redirectToRoute('home');
    }

    
    /*protected function embedPictureForms($form, Trick $trick): void
    {
        $pictureForms = $form->get('pictures');

        // Embed pictures forms
        foreach ($pictureForms as $pictureForm) {
            /** @var Picture $picture */
            /*$picture = $pictureForm->getData();

            /** @var UploadedFile $pictureFile */
            /*$pictureFile = $pictureForm->get('filename')->getData();

            // this condition is needed because the 'filename' field is not required
            // so the image file must be processed only when a file is uploaded
            if ($pictureFile) {
                $event = ($picture->getFilename()) ? 'file.update' : 'file.new';
                $this->dispatcher->dispatch(new FileUpdateEvent($picture, $pictureFile), $event);
            }
        }
    }*/
    
}
