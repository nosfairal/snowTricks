<?php

namespace App\Form;

use App\Entity\Trick;
use App\Entity\GroupTrick;
use App\Service\FileManagerService;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\MakerBundle\FileManager;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class TrickType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class,[
                'label' => 'Nom du trick : ',
                'required' => true,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('description', TextareaType::class,[
                'label' => 'Description du trick : ',
                'required' => true,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('groupTrick', EntityType::class, [
                'label' => 'Catégorie du trick : ',
                'required' => true,
                'class' => GroupTrick::class,
                'choice_label' => function (GroupTrick $group) {
                    return ucfirst($group->getName());
                },
                'attr' => [
                    'class' => 'form-select'
                ],
            ])
            ->add('pictures', CollectionType::class, [
                'entry_type' => PictureType::class,
                'entry_options' => [
                    'label' => false
                ],
                'allow_add' => true,
                'by_reference' => false,
                'allow_delete' => true,
                'mapped' => false
            ])
            ->add('videos', CollectionType::class, [
                'entry_options' => [
                    'label' => false
                ],
                'allow_add' => true,
                'allow_delete' => true,
                'label' => false,
                'mapped' => false,
                'entry_type' => VideoType::class
            ])
            /*->add('submit', SubmitType::class, [
                'label'=>'Ajouter un nouveau trick',
                'attr' => [
                    'class' => 'btn btn-block btn-secondary py-2 px-3'
                ]
            ])*/
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Trick::class,
        ]);
    }
}
