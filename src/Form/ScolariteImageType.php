<?php

namespace App\Form;

use App\Entity\ScolariteImage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use App\Entity\Scolarite;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ScolariteImageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('url',FileType::class, [
            'label' => 'Ajoute une image',
            'data_class' => null,
            ])
        ->add('scolarites',EntityType::class,[
            'class' => Scolarite::class,
            'choice_label' => function(Scolarite $scolarite)
            {
                return $scolarite->getNiveau()->getNom();
            },
            'label'=>'Niveau'
        ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ScolariteImage::class,
        ]);
    }
}
