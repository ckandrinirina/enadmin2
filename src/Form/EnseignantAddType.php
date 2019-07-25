<?php

namespace App\Form;

use App\Entity\Enseignant;
use App\Entity\EnseignantType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class EnseignantAddType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('contact')
            ->add('adresse')
            ->add('dateNaissance',BirthdayType::class)
            ->add('lieuxNaissance')
            ->add('photo',FileType::class, [
                'label' => 'Ajoute une image',
                'data_class' => null,
                ])
            ->add('type',EntityType::class,[
                'class'=>EnseignantType::class,
                'choice_label'=>function(EnseignantType $enseignantType)
                {
                    return $enseignantType->getType();
                }
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Enseignant::class,
        ]);
    }
}
