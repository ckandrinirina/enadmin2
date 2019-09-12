<?php

namespace App\Form;

use App\Entity\UC;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use App\Entity\Niveaux;
use App\Entity\Semestre;
use App\Form\NiveauxType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
// use App\Form\SemestreType;
class UCType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom',TextType::class,[
                'label' => 'nom'
            ])
            // ->add('coefficient',TextType::class,[
            //     'label' => 'coefficient'
            // ])
            // ->add('credit',IntegerType::class,[
            //     'label' => 'crédits'
            // ])
            ->add('niveaux', CollectionType::class, [
                'entry_type' => NiveauxType::class,
                'allow_add' => true,
                'allow_delete' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => UC::class,
        ]);
    }
}
