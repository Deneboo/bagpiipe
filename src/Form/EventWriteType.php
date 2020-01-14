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

class EventWriteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('event_story', null,[
                'label' => 'Compte rendu :',
                'help' => 'Pas de limites de mots, fais toi plaisir !',
                'required' => false
            ])
            ->add('event_newspaper_article', null, [
                'label' => 'Titre du compte rendu internet :',
                'required' => false
            ])
            ->add('event_newspaper_article_link', TextareaType::class, [
                'label' => 'Lien sur le compte rendu internet :',
                'required' => false
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

