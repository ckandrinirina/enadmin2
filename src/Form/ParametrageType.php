<?php

namespace App\Form;

use App\Entity\Parametrage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Enseignant;

class ParametrageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('chefmention',EntityType::class,[
                'class' => Enseignant::class,
                'choice_label' => function(Enseignant $enseignant)
                {
                    return ($enseignant->getNom().' '.$enseignant->getNom());
                },
                'label'=>false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => null,
        ]);
    }
}
