<?php

namespace App\Form;

use App\Entity\Scolarite;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\Droit;
use App\Entity\Niveaux;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class ScolariteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $data = $options['data'];
        $builder
            ->add('numeroInscription')
            ->add('dateInscription',DateType::class)
            // ->add('droit',EntityType::class,[
            //     'class' => Droit::class,
            //     'choice_label' => function(Droit $droit)
            //     {
            //         return $droit->getValeur();
            //     },
            //     'label'=>'Niveau'
            // ])
            ->add('niveau',ChoiceType::class,[
                'choices'=> $data,
                'choice_label' => function(Niveaux $niveaux, $key, $value)
                {
                    return $niveaux->getNom();
                },
                'choice_attr' => function(Niveaux $niveaux, $key, $value) {
                    return ['value' => $niveaux->getId()];
                },
                'label' => false
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
