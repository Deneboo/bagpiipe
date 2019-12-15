<?php

namespace App\Form;

use App\Entity\Event;
use App\Entity\Adress;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EventType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('event_title', null,
                ['label' => 'Titre de l\'évènement :'])
            ->add('event_subtitle', null,
                ['label' => 'Sous titre :'])
            ->add('event_description', null,
                ['label' => 'Description :'])
            ->add('event_date_start', DateType::class, [
                'label' => 'Date de début :',
                'widget' => 'choice',
            ])
            ->add('event_date_end', DateType::class, [
                'placeholder' => [
                    'label' => 'Date de fin :',
                    'day' => 'Day', 'month' => 'Mois', 'year' => 'Year',
                ]
            ])
            ->add('event_story', null,
                ['label' => 'Article :'])
            ->add('adresses', EntityType::class, [
                'label' => 'Adresse :',
                'class' => Adress::class,
                'choice_label' => 'adress_street_name',
                'multiple' => true
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Event::class,
        ]);
    }
}
