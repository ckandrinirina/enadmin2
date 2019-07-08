<?php

namespace App\Form;

use App\Entity\UC;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use App\Form\NiveauxType;
// use App\Form\SemestreType;
class UCType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom',TextType::class,[
                'label' => 'nom'
            ])
            ->add('coefficient',TextType::class,[
                'label' => 'coéfficient'
            ])
            ->add('credit',IntegerType::class,[
                'label' => 'crédit'
            ])
            ->add('niveaux', CollectionType::class, [
                'entry_type' => NiveauxType::class,
                'allow_add' => true,
                'allow_delete' => true,
            ])
            // ->add('semestres', CollectionType::class, [
            //     'entry_type' => SemestreType::class,
            //     'allow_add' => true,
            //     'allow_delete' => true,
            // ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => UC::class,
        ]);
    }
}
