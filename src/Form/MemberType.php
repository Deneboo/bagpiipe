<?php

namespace App\Form;

use App\Entity\Member;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MemberType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('imageFile', FileType::class, [
                'label' => 'Image :',
                'required' => false
            ])
            ->add('member_name')
            ->add('member_surname')
            ->add('member_birth_date', BirthdayType::class, [
                'label' => 'Date de naissance :',
                'placeholder' => [
                    'day' => 'Jour', 'month' => 'Mois', 'year' => 'Année',
                ],
                'format' => 'dd-MM-yyyy',
                'required' => false
            ])
            ->add('member_membership_date', DateType::class, [
                'label' => 'Date d\'entrée :',
                'placeholder' => [
                    'day' => 'Jour', 'month' => 'Mois', 'year' => 'Année',
                ],
                'format' => 'dd-MM-yyyy',
                'required' => false
            ])
            ->add('member_information')
            ->add('member_phone')
            ->add('member_story')
            ->add('member_statut')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Member::class,
        ]);
    }
}
