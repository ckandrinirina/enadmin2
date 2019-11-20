<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\Niveaux;
use App\Entity\Semestre;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class NiveauxType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('niveaux',EntityType::class,[
                'class' => Niveaux::class,
                'choice_label' => function(Niveaux $niveaux)
                {
                    return $niveaux->getNiveau();
                },
                'label'=>'Niveau'
            ])
            ->add('semestre',EntityType::class,[
                'class' => Semestre::class,
                'choice_label' => function(Semestre $semestre)
                {
                    return $semestre->getSemestre();
                },
                'label'=>'Semestre'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
