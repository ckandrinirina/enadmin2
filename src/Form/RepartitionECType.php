<?php

namespace App\Form;

use App\Entity\RepartitionEC;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\Niveaux;
use App\Entity\Semestre;

class RepartitionECType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            /*->add('ec')*/
            ->add('niveaux',EntityType::class,[
                'class'=>Niveaux::class,
                'choice_label'=>function(Niveaux $niveaux)
                {
                    return $niveaux->getNiveau();
                }
            ])
            ->add('semestre',EntityType::class,[
                'class'=>Semestre::class,
                'choice_label'=>function(Semestre $semestre)
                {
                    return $semestre->getSemestre();
                }
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => RepartitionEC::class,
        ]);
    }
}
