<?php

namespace App\Form;

use App\Entity\Post;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'title',
                TextType::class,
                [
                    'attr' => [
                        'class' => 'form-control',
                        'placeholder' => 'Title',
                        'required' => 'true'
                    ],
                    'label' => 'Nombre'
                ]
            )
            ->add(
                'body',
                TextType::class,
                [
                    'attr' => [
                        'class' => 'form-control',
                        'placeholder' => 'Content',
                        'required' => 'true'
                    ],
                    'label' => 'Nombre'
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Post::class,
        ]);
    }
}
