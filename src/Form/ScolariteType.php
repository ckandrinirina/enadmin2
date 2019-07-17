<?php

namespace App\Form;

use App\Entity\Scolarite;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\Droit;
use App\Entity\Niveaux;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ScolariteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numeroInscription')
            ->add('dateInscription')
            // ->add('droit',EntityType::class,[
            //     'class' => Droit::class,
            //     'choice_label' => function(Droit $droit)
            //     {
            //         return $droit->getValeur();
            //     },
            //     'label'=>'Niveau'
            // ])
            ->add('niveau',EntityType::class,[
                'class' => Niveaux::class,
                'choice_label' => function(Niveaux $niveaux)
                {
                    return $niveaux->getNom();
                },
                'label'=>'Niveau'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Scolarite::class,
        ]);
    }
}
