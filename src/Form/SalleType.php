<?php

namespace App\Form;

use App\Entity\Salle;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\SalleClass;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class SalleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('salleClass',EntityType::class,[
                'class' => SalleClass::class,
                'choice_label' => function(SalleClass $salleClass)
                {
                    return $salleClass->getNom();
                },
                'label'=>'Choisir salle de classe'
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
