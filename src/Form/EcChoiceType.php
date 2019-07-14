<?php

namespace App\Form;

use App\Entity\EC;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\EmploiDuTemps;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class EcChoiceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $data = $options['data'];
        $builder
            ->add('ec',ChoiceType::class,[
                'choices'=> $data,
                'choice_label' => function(EC $ec, $key, $value)
                {
                    return $ec->getNom();
                },
                'choice_attr' => function(EC $ec, $key, $value) {
                    return ['value' => $ec->getId()];
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
