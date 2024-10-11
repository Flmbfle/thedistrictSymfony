<?php

namespace App\Form;

use App\Entity\Utilisateur;
// use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'attr' => [
                    'class' => 'form-control my-2'
                ],
                'label'=> 'Nom',
            ])
            ->add('prenom', TextType::class, [
                'attr' => [
                    'class' => 'form-control my-2'
                ],
                'label'=> 'Prénom',
            ])
            ->add('email', EmailType::class, [
                'attr' => [
                    'class' => 'form-control my-2'
                ],
                'label'=> 'E-mail',
            ])
            ->add('telephone', TextType::class, [
                'attr' => [
                    'class' => 'form-control my-2'
                ],
                'label'=> 'Téléphone',
            ])
            ->add('adresse', TextType::class, [
                'attr' => [
                    'class' => 'form-control my-2'
                ],
                'label'=> 'Adresse',
            ])
            ->add('cp', TextType::class, [
                'attr' => [
                    'class' => 'form-control my-2'
                ],
                'label'=> 'Code Postal',
            ])
            ->add('ville', TextType::class, [
                'attr' => [
                    'class' => 'form-control my-2'
                ],
                'label'=> 'Ville',
            ])
            ->add('RGPDConsent', CheckboxType::class, [
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'You should agree to our terms.',
                    ]),
                ],
                'label'=> 'En m\'inscrivant à ce site j\'accepte ....',
            ])
            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password',
                'class' => 'form-control my-2'
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrez un mot de passe',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Votre mot de passe doit contenir au minimum {{ limit }} caractères',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Utilisateur::class,
        ]);
    }
}
