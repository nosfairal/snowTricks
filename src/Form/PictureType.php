<?php

namespace App\Form;

use App\Entity\Picture;
use App\Entity\Trick;
use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class PictureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add("titre", TextType::class, [
                'attr' => [
                    'label' => "Titre de l'image",
                    'placeholder' => "Titre de l'image",
                    'class' => 'form-control'
                ],
                'constraints' => [
                    new Length([
                        'min' => 3,
                        'max' => 50,
                        'minMessage' => "Le titre de l'image doit faire au moins {{ limit }} caractères",
                        'maxMessage' => "Le titre de l'image ne doit pas faire plus de {{ limit }} caractères"
                    ]),
                    new NotBlank([
                        'message' => "Vous devez donner un titre à l'image"
                    ])
                ]
            ])
            ->add('description', TextType::class, [
                'attr' => [
                    'placeholder' => "Courte description de l'image",
                    'label' => 'Description : ',
                    'class' => 'form-control'
                ],
                'constraints' => [
                    new Length([
                        'min' => 3,
                        'max' => 140,
                        'minMessage' => "La description de l'image doit faire au moins {{ limit }} caractères",
                        'maxMessage' => "La description de l'image ne doit pas faire plus de {{ limit }} caractères"
                    ]),
                    new NotBlank([
                        'message' => "Vous devez faire une courte description"
                    ])
                ]
            ])
            ->add('filename', FileType::class, [
                'label' => "Image d'illustration (formats acceptés : .jpg, .jpeg, .png / taille max - 2Mo max) : ",
                // unmapped means that this field is not associated to any entity property
                'mapped' => false,
                'attr' => [
                    'class' => 'form-control'
                ],
                // make it optional so you don't have to re-upload the file
                // every time you edit the Picture details
                // 'required' => false,
                // unmapped fields can't define their validation using annotations
                // in the associated entity, so you can use the PHP constraint classes
                'constraints' => [
                    new File([
                        'maxSize' => '2048k',
                        'mimeTypes' => [
                            'image/jpg',
                            'image/jpeg',
                            'image/png',
                        ],
                        'mimeTypesMessage' => 'Merci de télécharger un format de fichier parmi ceux-ci : jpg, jpeg or png',
                    ])
                ],
            ])
            /*->add('trick', EntityType::class, [
                'required' => true,
                'placeholder' => '-- Choisissez le trick --',
                'class' => Trick::class,
                'choice_label' => function (Trick $trick) {
                    return ucfirst($trick->getName());
                }
            ])*/;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Picture::class,
        ]);
    }
}
