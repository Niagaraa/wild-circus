<?php

namespace App\Form;

use App\Entity\Event;
use App\Entity\Troop;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TroopType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('alias', TextType::class, ['label' => 'Pseudo'])
            ->add('name', TextType::class, ['label' => 'Prénom Nom',
                'required' => false])
            ->add('picture', TextType::class, ['label' => 'Photo'])
            ->add('speciality', TextType::class, ['label' => 'Art'])
            ->add('event', EntityType::class, [
                'class' => Event::class,
                'choice_label' => 'title',
                'label' => 'Spectacles',
                'multiple' => true,
                'expanded' => true,
                'required' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Troop::class,
        ]);
    }
}
