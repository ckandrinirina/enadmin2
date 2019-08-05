<?php

namespace App\Form;

use App\Entity\Etudiant;
use App\Entity\TypeParcours;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Sexe;
use App\Entity\Niveaux;
use App\Entity\AnneUniversitaire;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Doctrine\DBAL\Types\StringType;

class EtudiantEditType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom',TextType::class,[
                'label'=>'Nom'
                ])
            ->add('prenom',TextType::class,[
                'label'=>'Prénom(s)'
                ])
            ->add('photo',FileType::class, [
                'label' => 'Ajoute une image',
                'data_class' => null,
                ])
            ->add('pere',TextType::class,[
                'label'=>'Pere'
                ])
            ->add('professionPere',TextType::class,[
                'label'=>'Profession du pere'
                ])
            ->add('mere',TextType::class,[
                'label'=>'mere'
                ])
            ->add('professionMere',TextType::class,[
                'label'=>'Profession du mere'
                ])
            ->add('contact',TelType::class)
            ->add('date_naissance',BirthdayType::class,[
                'label'=>'Date de Naissance'
            ])
            ->add('lieuxNaissance',TextType::class,[
                'label'=>'Lieux de naissance'
                ])
            ->add('adresse',TextType::class,[
                'label'=>'Adresse'
                ])
            ->add('anneEntre',IntegerType::class,[
                'label'=>'Anné d\'entré à l\'université '
            ])
            ->add('parcour',EntityType::class,[
                'class' => TypeParcours::class,
                'choice_label' => function(TypeParcours $typeParcours)
                {
                    return $typeParcours->getType();
                },
                'label'=>'Type de parcour'
            ])
            ->add('sexe',EntityType::class , [
                'class'=>Sexe::class,
                'choice_label' => function (Sexe $sexe){
                    return $sexe->getSexe();
                },
                'label'=>'sexe'
            ])
            // ->add('niveaux',EntityType::class , [
            //     'class'=>Niveaux::class,
            //     'choice_label' => function (Niveaux $niveaux){
            //         return $niveaux->getNiveau();
            //     },
            //     'label'=>'niveaux'
            // ])
            // ->add('anneUniversitaire',EntityType::class , [
            //     'class'=>AnneUniversitaire::class,
            //     'choice_label' => function (AnneUniversitaire $au){
            //         return $au->getAnneUniversitaire();
            //     },
            //     'label'=>'année universitaire'
            // ])
            /*->add('scolarite')
            ->add('user')*/
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Etudiant::class,
        ]);
    }
}