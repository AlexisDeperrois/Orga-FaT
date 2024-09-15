<?php

namespace App\Form;

use App\Entity\Reservation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Name', TextType::class, [
                "label" => "Nom"
            ])
            ->add('firstname', TextType::class, [
                "label" => "Prénom"
            ])
            ->add('mail', TextType::class, [
                "label" => "email"
            ])
            ->add('phoneNumber',TextType::class, [
                "label" => "Numéro de téléphone"
            ])
            ->add('contactDate', null, [
                'widget' => 'single_text',
            ])
            ->add('sendingDocDate', null, [
                'widget' => 'single_text',
            ])
            ->add('comments',TextType::class, [
                "label" => "Commentaire"
            ])
            ->add('nbMetres')
            ->add('hasPortant')
            ->add('FCPEMember')
            ->add('nbMerguez')
            ->add('nbSaucisse')
            ->add('nbPaniniDinde')
            ->add('nbPaniniFromage')
            ->add('nbPaniniJambon')
            ->add('assuranceRecu')
            ->add('carteIdRecu')
            ->add('inscriptionCheckedDate', null, [
                'widget' => 'single_text',
                "label" => "Date de validation de l'inscription"
            ])
            ->add('Payed')
            ->add('moyenPaiement',TextType::class, [
                "label" => "Moyen de Paiement"
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
        ]);
    }
}
