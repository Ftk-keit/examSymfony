<?php

namespace App\Form;

use App\Entity\Classe;
use App\Entity\Cours;
use App\Entity\Professeur;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CoursType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('module')
            ->add('professeurs', EntityType::class, [
                'class' => Professeur::class,
                'choice_label' => 'id',
            ])
            ->add('classe', EntityType::class, [
                'class' => Classe::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Cours::class,
        ]);
    }
}