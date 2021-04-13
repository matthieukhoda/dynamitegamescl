<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Games;
use App\Entity\Plateform;
use phpDocumentor\Reflection\Types\Nullable;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Vich\UploaderBundle\Form\Type\VichImageType;
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
            ->add('imageFile', VichImageType::class,  [
                'required' => false,
                'label' => "Couverture"
            ])
            ->add('categories', EntityType::class, [
                'class' => Category::class,
                'choice_label' => 'title',
                'multiple' => true,
                'expanded' => true,
                'by_reference' => false,
            ])
            ->add('plateforms', EntityType::class, [
                'class' => Plateform::class,
                'choice_label' => 'plateforme',
                'multiple' => true,
                'expanded' => true,
                'by_reference' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Games::class,
        ]);
    }
}