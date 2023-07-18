<?php

namespace App\Service\Post\Domain\Form;

use App\Entity\Post;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class PostFormType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options): void
	{
		$builder
			// ->add('userId')
			->add(
				'title',
				TextType::class,
				[
					'attr' => [
						'class' => 'form-control',
						'placeholder' => 'Title',
						'required' => 'true'
					],
					'label' => 'Title'
				]
			)
			->add('body', TextareaType::class, [
				'mapped' => false,
				'attr' => [
					'class' => 'form-control',
					// 'placeholder' => ''
				],
				'label' => 'Content'
			]);
	}

	public function configureOptions(OptionsResolver $resolver): void
	{
		$resolver->setDefaults([
			'data_class' => Post::class,
		]);
	}
}
