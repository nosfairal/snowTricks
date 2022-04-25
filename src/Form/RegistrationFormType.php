<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'Votre mail :*'
            ])
            ->add('userName', TextType::class,  [
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'Votre pseudonyme :*',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Merci de renseigner votre pseudonyme',
                    ]),
                    new Length([
                        'min' => 3,
                        'minMessage' => 'Votre pseudonyme doit faire au moins {{ limit }} caractères',
                        // max length allowed by Symfony for security reasons
                        'max' => 30,
                        'maxMessage' => 'Votre pseudonyme doit faire au plus {{ limit }} caractères'
                    ]),
                ],
            ])
            ->add('RGPDConsent', CheckboxType::class, [
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'Vous devez accepter notre politique de confidentialité',
                    ]),
                ],
                'attr' => [
                    'class' => 'form-check-input'
                ],
                'label' => "En m'inscrivant à ce site j'accepte ces conditions d'utilisation "
            ])
            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'attr' => [
                    'autocomplete' => 'new-password',
                    'class' => 'form-control'
                ],
                'label' => 'Votre mot de passe :*',
                'constraints' => [
                    new NotBlank([
                        'message' => "Merci d'entrer un mot de passe",
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Votre mot de passe doit faire au moins {{ limit }} caractères',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ])
            ->add('avatar', FileType::class, [
                'label' => "Votre avatar (formats acceptés : .jpg, .jpeg, .png / taille max - 2Mo max) : ",
                // unmapped means that this field is not associated to any entity property
                'mapped' => false,
                'attr' => [
                    'class' => 'form-control'
                ],
                // make it optional so you don't have to re-upload the file
                // every time you edit the Picture details
                'required' => false,
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
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
