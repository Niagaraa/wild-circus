<?php

namespace App\Form;

use App\Entity\Event;
use App\Entity\Troop;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EventType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date')
            ->add('city', TextType::class, [
                'label' => 'Ville'
            ])
            ->add('title', TextType::class, [
                'label' => 'Titre'
            ])
            ->add('description')
            ->add('picture', TextType::class, [
                'label' => 'Illustration'
            ])
            ->add(('members'), EntityType::class, [
                'class' => Troop::class,
                'choice_label' => 'alias',
                'label' => 'Participants',
                'multiple' => true,
                'expanded' => true
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
