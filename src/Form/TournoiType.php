<?php

namespace App\Form;

use App\Entity\Tournoi;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TournoiType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomTournoi')
            ->add('nbMax')
            ->add('etat')
            ->add('r1')
            ->add('r2')
            ->add('r3')
            ->add('p1')
            ->add('p2')
            ->add('p3')
            ->add('imageTournoi')
            ->add('dateTournoi')
            ->add('heure')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Tournoi::class,
        ]);
    }
}
