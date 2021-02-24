<?php

namespace App\Form;

use App\Entity\Games;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GamesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, ['label' => 'Nom du jeu'])
            ->add('description', TextareaType::class, ['label' => 'Description'])
            ->add('price', TextType::class, ['label' => 'Prix'])
            ->add('stock', TextType::class, ['label' => 'Stock'])
            ->add('eanCode', TextType::class, ['label' => 'Code EAN'])
            ->add('categories')
            ->add('plateforms');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Games::class,
        ]);
    }
}