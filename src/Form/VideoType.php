<?php

namespace App\Form;

use App\Entity\Video;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VideoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('caption', TextType::class, [
                'label' => 'Caption',
                'attr' => ['placeholder' => 'Enter the name of the video']
            ])
            ->add('videoUrl', UrlType::class, [
                'label' => 'Videos',
                'help' => 'If you want to post multiple videos, press the button as many times as needed',
                'attr' => [
                    'placeholder' => 'Add a valid URL to put a video for the trick'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Video::class
        ]);
    }
}