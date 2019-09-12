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
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

class EnseignantAddType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Nom'
            ])
            ->add('prenom', TextType::class, [
                'label' => 'Prénom(s)'
            ])
            ->add('contact', TelType::class, [
                'label' => 'Numéro de téléphone primaire'
            ])
            ->add('contact2', TelType::class, [
                'label' => 'Autre numéro de téléphone'
            ])
            ->add('contact3', TelType::class, [
                'label' => 'Autre numéro de téléphone'
            ])
            ->add('mail', EmailType::class, [
                'label' => 'Adresse E-mail'
            ])
            ->add('matricule', TextType::class, [
                'label' => 'Imatriculation'
            ])
            ->add('adresse', TextType::class, [
                'label' => 'Adresse'
            ])
            ->add('dateNaissance', BirthdayType::class, [
                'label' => 'Date de Naissance'
            ])
            ->add('lieuxNaissance', TextType::class, [
                'label' => 'Lieu de naissance'
            ])
            ->add('photo', FileType::class, [
                'label' => 'Ajouter une image',
                'data_class' => null,
            ])
            ->add('type', EntityType::class, [
                'class' => EnseignantType::class,
                'choice_label' => function (EnseignantType $enseignantType) {
                    return $enseignantType->getType();
                }
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Enseignant::class,
        ]);
    }
}
