<?php

namespace App\Form;

use App\Entity\LoginType;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username',TextType::class,[
                'label' => 'Pseudo'
            ])
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'Mot de passe different', 
                'options' => ['attr' => ['class' => 'password-field']],
                'mapped' => false,
                'first_options'  => ['label' => 'Mot de passe'],
                'second_options' => ['label' => 'Confirmer mot de passe'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Insérer les mots de passes',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Le mots de passes doit contenir {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),

                ],
            ])
            /*->add('roles',CollectionType::class, [
                'entry_type'   => ChoiceType::class,
                'entry_options'  => [
                'choices'  => [
                    'étudiant' => 'ROLE_USER',
                    'enseignant'     => 'ROLE_ADMIN',
                    'super_admin'    => 'ROLE_SUPER_ADMIN',
            ],
        ]])*/
            ->add('type',EntityType::class , [
                'class'=>LoginType::class,
                'choice_label'=>function(LoginType $loginType)
                {
                    return $loginType->getType();
                }
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
