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
                'label' => 'Titre de la video : ',
                'attr' => ['placeholder' => 'Entrez le nom de la video',
                'class' => 'form-control'
            ],
            ])
            ->add('videoUrl', UrlType::class, [
                'label' => 'Lien de partage de la video : ',
                'help' => 'Si vous voulez entrer plusieurs vidéos, appuyez autant de fois que désirer sur le bouton',
                'attr' => [
                    'placeholder' => 'Entrez une adresse URL valide pour partager la video',
                    'class' => 'form-control'
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