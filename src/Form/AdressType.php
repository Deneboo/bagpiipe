<?php

namespace App\Form;

use App\Entity\Adress;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('adress_title', null, [
                'label' => 'Titre :',
                'help' => 'Exemple : Tréport - Pentecôte...'
            ])
            ->add('adress_street_number', null, [
                'label' => 'Numéro de rue :'
            ])
            ->add('adress_street_name', null, [
                'label' => 'Nom de rue :'
                ])
            ->add('adress_information', null, [
                'label' => 'Complément d\'information :'
            ])
            ->add('city', CityType::class, [
                'label' => 'Ville :'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Adress::class,
        ]);
    }
}
