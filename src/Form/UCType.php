<?php

namespace App\Form;

use App\Entity\UC;
use App\Entity\Niveaux;
use App\Entity\Semestre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
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
            ->add('niveaux', EntityType::class, [
                'class' => Niveaux::class,
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('semestres', EntityType::class, [
                'class' => Semestre::class,
                'multiple' => true,
                'expanded' => true,
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => UC::class,
        ]);
    }
}
