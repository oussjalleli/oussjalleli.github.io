<?php

namespace App\Form;

use App\Entity\Matchh;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MatchhType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date')
            ->add('serveur')
            ->add('etat')
            ->add('type')
            ->add('score1')
            ->add('score2')
            ->add('idEquipe1')
            ->add('idTournoi')
            ->add('idEquipe2')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Matchh::class,
        ]);
    }
}
