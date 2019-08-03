<?php

namespace App\Form;

use App\Entity\School;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
class SchoolType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('beginAt',DateTimeType::class,[
                'label'=> 'Date de commencement'
            ])
            ->add('endAt',DateTimeType::class,[
                'label' => 'Fin de l\'événement'
            ])
            ->add('title',TextType::class,[
                'label'=>'Titre'
            ])
            ->add('content',CKEditorType::class,[
                'label'=>'contenu',
                'config' => array(
                    'toolbar' => 'full',
                    array(
                        'name' => 'links',
                        'items' => array('Link','Unlink'),
                    ),
                    array(
                        'name' => 'insert',
                        'items' => array('Image'),
                    ),
                ),
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => School::class,
        ]);
    }
}
