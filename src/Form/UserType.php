<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Member;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', null,
                ['label' => 'Adresse électronique :'])
            ->add('username', null,
                ['label' => 'Pseudonyme :'])
            ->add('roles', CollectionType::class, [
                'entry_type'   => ChoiceType::class,
                'entry_options'  => [
                    'label' => false,
                    'choices' => [
                        'Simple mortel' => 'ROLE_USER',
                        'Elève' => 'ROLE_STUDENT',
                        'Prof' => 'ROLE_TEACHER',
                        'Gratte-papier' => 'ROLE_WRITER',
                        // 'Boss' => 'ROLE_ADMIN',
                        // 'God' => 'ROLE_SUPER_ADMIN',
                    ],
                ],
            ])
            ->add('member', MemberType::class, [
                'label' => 'Membre :'
            ])
            /* Erreur get collectionType !!!
            ->add('member', EntityType::class, [
                'label' => "Membre :",
                'class' => Member::class,
                'choice_label' => 'member_name',
                'multiple' => 'false',
            ])
            */
            // ->add('password')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
