<?php

namespace App\Form;

use App\Entity\EC;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\EmploiDuTemps;
use App\Repository\ECRepository;

class EcChoiceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $niveau = $options['data'];
        $builder
            ->add('ec',EntityType::class,[
                'class' => EC::class,
                'choice_label' => function (EntityRepository $ec,$niveau) {
                    $ecN = $ec->createQueryBuilder('e')->innerJoin('e.repartitionECs','r','WITH','r.niveaux = :val')->setParameter('val',$niveau)->orderBy('e.nom','DESC');
                    return ($ec->getNom());
                },
                // 'query_builder' => function (EntityRepository $ec,$niveau) {
                //     return $ec->createQueryBuilder('e')->innerJoin('e.repartitionECs','r','WITH','r.niveaux = :val')->setParameter('val',$niveau)->orderBy('e.nom','DESC'); 
                // },
                // 'choice_label' => 'nom',
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
