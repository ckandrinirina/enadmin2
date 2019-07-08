<?php

namespace App\Form;

use App\Entity\EC;
use App\Entity\Enseignant;
use App\Entity\UC;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class EcType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('enseignant', EntityType::class, [
                'class' => Enseignant::class,
                'choice_label' => function (Enseignant $enseignant) {
                    return ($enseignant->getNom() . ' ' . $enseignant->getPrenom());
                },
            ])
            ->add('UC', EntityType::class, [
                'class' => UC::class,
                'choice_label' => function (UC $UC) {
                    return $UC->getNom();
                }
            ])
            ->add('coefficient')
            ->add('code')
            ->add('credit')
            // ->add('repartitionECs', CollectionType::class, [
            //     'entry_type' => RepartitionECType::class,
            //     'allow_add' => true,
            //     'allow_delete' => true,
            // ]);
            ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => EC::class,
        ]);
    }
}
