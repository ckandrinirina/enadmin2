<?php

namespace App\Form;

use App\Entity\EC;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\EmploiDuTemps;

class EcChoiceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ec',EntityType::class,[
                'class'=>EC::class,
                'choice_label' => function(EC $ec)
                {
                    return ($ec->getNom()); 
                },
                'label' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => EmploiDuTemps::class,
        ]);
    }
}
