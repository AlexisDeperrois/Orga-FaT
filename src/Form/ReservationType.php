<?php

namespace App\Form;

use App\Entity\Reservation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Name', TextType::class, [
                "label" => "Nom",
            ])
            ->add('firstname', TextType::class, [
                "label" => "Prénom",
            ])
            ->add('mail', TextType::class, [
                "label" => "email",
            ])
            ->add('phoneNumber',TextType::class, [
                "label" => "Numéro de téléphone",
                "required"=>false,
            ])
            ->add('contactDate', null, [
                'widget' => 'single_text',
            ])
            ->add('sendingDocDate', null, [
                'widget' => 'single_text',
            ])
            ->add('comments',TextType::class, [
                "label" => "Commentaire",
                "required"=>false,
            ])
            ->add('nbMetres')
            ->add('hasPortant', CheckboxType::class, [
                "label"=> "Portant ?",
                "required"=>false,
            ])
            ->add('FCPEMember', CheckboxType::class, [
                "label"=> "Membre FCPE ?",
                "required"=>false,
            ])
            ->add('nbMerguez')
            ->add('nbSaucisse')
            ->add('nbPaniniDinde')
            ->add('nbPaniniFromage')
            ->add('nbPaniniJambon')
            ->add('assuranceRecu', null , [
                'label'=> "assurance reçue ?"
            ])
            ->add('carteIdRecu', CheckboxType::class, [
                'label'=> "carte d'identité reçue ?",
                "required"=>false,
            ])
            ->add('inscriptionCheckedDate', null, [
                'widget' => 'single_text',
                "label" => "Date de validation de l'inscription"
            ])
            ->add('Payed', CheckboxType::class, [
                'label'=> "Payé ?",
                "required"=>false,
            ])
            ->add('moyenPaiement',ChoiceType::class, [
                "label" => "Moyen de Paiement",
                "choices" => [
                    'choisir un moyen de paiement'=>null,
                    'cheque' => 'cheque',
                    'espèce' => 'espèces',
                ]
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
