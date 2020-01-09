<?php

namespace App\Form;

use App\Entity\City;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CityType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('city_name', null,
                ['label' => 'Nom de la ville :'])
            ->add('city_postcode', null,
                ['label' => 'Code postal :'])
            ->add('city_country', CountryType::class, array(
                'label' => 'Pays :',
                'label_format' => 'form.city.%name%',
                'preferred_choices' => array('FR'),
                'choice_translation_locale' => null
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => City::class,
        ]);
    }
}
