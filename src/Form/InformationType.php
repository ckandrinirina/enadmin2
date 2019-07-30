<?php

namespace App\Form;

use App\Entity\Information;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\Niveaux;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class InformationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('contenu')
            // ->add('addAt')
            // ->add('etudiant')
            ->add('niveaux',EntityType::class,[
                'class' => Niveaux::class,
                'choice_label' => function(Niveaux $niveaux)
                {
                    return $niveaux->getNom();
                },
                'label'=>'Type de parcour',
                'multiple'=>true,
                'expanded'=>true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Information::class,
        ]);
    }
}
