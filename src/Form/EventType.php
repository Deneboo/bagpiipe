<?php

namespace App\Form;

use App\Entity\Event;
use App\Entity\Adress;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EventType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('event_title')
            ->add('event_subtitle')
            ->add('event_description')
            ->add('event_date_start')
            ->add('event_date_end')
            ->add('event_story')
            ->add('adresses', EntityType::class, [
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
