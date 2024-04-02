<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class CommandeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('adresseLivraison', TextType::class, [
                'attr' => [
                    'class' => 'form-control my-2'
                ],
                'label'=> 'Adresse de livraison',
            ])
            ->add('adresseFacturation', TextType::class, [
                'attr' => [
                    'class' => 'form-control my-2'
                ],
                'label'=> 'Adresse de facturation',
            ])
            ->add('moyenPaiement', ChoiceType::class, [
                'choices' => [
                    'Visa' => 'Visa',
                    'MasterCard' => 'Mastercard',
                    'Maestro' => 'Maestro',
                    'American Express' => 'American Express',
                    // Ajoutez d'autres moyens de paiement ici si nécessaire
                ],
                'placeholder' => 'Sélectionnez un moyen de paiement',
                'attr' => [
                    'class' => 'form-control my-2'
                ],
                'label' => 'Moyen de paiement',
            ])
            

            ->add('RGPDConsent', CheckboxType::class, [
                'mapped' => false,
                'attr' => [
                    'class'=> 'my-3'
                ],
                'constraints' => [
                    new IsTrue([
                        'message' => 'You should agree to our terms.',
                    ]),
                ],
                'label'=> 'En m\'inscrivant à ce site j\'accepte ....',
            ])

            ->add('numeroCarte', TextType::class, [
                'attr' => [
                    'class' => 'form-control my-2',
                ],
                'label' => 'Numéro de carte',
            ])
            ->add('ccv', TextType::class, [
                'attr' => [
                    'class' => 'form-control my-2',
                ],
                'label' => 'CCV',
            ]);

        ;
    }
        
    

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
