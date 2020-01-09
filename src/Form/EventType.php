<?php

namespace App\Form;

use App\Entity\Event;
use App\Entity\City;
use App\Entity\Adress;
use phpDocumentor\Reflection\Types\String_;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
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
            ->add('imageFile', FileType::class, [
                'label' => 'Image :',
                'required' => false
            ])
            ->add('event_description', TextareaType::class,
                ['row_attr' => ['class' => 'tinymce', 'id' => '...',],
                'label' => 'Description :',
                ])
            ->add('event_date_start', BirthdayType::class, [
                'label' => 'Date de début :',
                'placeholder' => [
                    'day' => 'Jour', 'month' => 'Mois', 'year' => 'Année',
                ],
                'format' => 'dd-MM-yyyy'
            ])
            ->add('event_date_end', BirthdayType::class, [
                'label' => 'Date de fin :',
                'placeholder' => [
                    'day' => 'Jour', 'month' => 'Mois', 'year' => 'Année',
                ],
                'format' => 'dd-MM-yyyy',
                'required' => false
            ])
            ->add('event_story', null,[
                'label' => 'Article :',
                'help' => 'Pas de limites de mots, fais toi plaisir !',
                ])
            // Test imbrication de form
            ->add('adresses', CollectionType::class, [
                'entry_type' => AdressType::class,
                'entry_options' => ['label' => false],
                'allow_add' => true,
            ])
            // ->add('city', CityType::class);

             ->add('adresses', EntityType::class, [
                'label' => 'Adresse :',
                'class' => Adress::class,
                'choice_label' => 'adress_title',
                'multiple' => true,
                'help' => 'Sélectionner l\'adresse.',
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
