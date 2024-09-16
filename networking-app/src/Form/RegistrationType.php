<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Validator\Constraints\PasswordStrength;
use Symfony\Component\Validator\Constraints\NotCompromisedPassword;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('fullName', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                ],
                'label' => 'Comment vous appelez-vous ?',
                'required' => true,
                'label_attr' => [
                    'class' => 'form-label mt-3',
                ],
                'constraints' => [
                    new NotBlank(),
                ],
            ])
            ->add('phoneNumber', TelType::class, [
                'attr' => [
                    'class' => 'form-control',
                ],
                'label' => 'Numéro de téléphone',
                'label_attr' => [
                    'class' => 'form-label mt-3',
                ],
                'constraints' => [
                    new Regex([
                        'message' => 'Please enter a valid phone number',
                        'pattern' => '/^(?:(?:\+|00)33[\s.-]{0,3}(?:\(0\)[\s.-]{0,3})?|0)[1-9](?:(?:[\s.-]?\d{2}){4}|\d{2}(?:[\s.-]?\d{3}){2})$/',
                    ]),
                ],
            ])
            ->add('email', EmailType::class, [
                'attr' => [
                    'class' => 'form-control',
                ],
                'label' => 'Adresse e-mail professionnelle',
                'required' => true,
                'label_attr' => [
                    'class' => 'form-label mt-3',
                ],
                'constraints' => [
                    new Regex([
                        'pattern' => '/[^@\s]+@[^@\s]+\.[^@\s]+/',
                    ]),
                ],
            ])
            ->add('password', PasswordType::class, [
                'toggle' => true,
                'attr' => [
                    'class' => 'form-control',
                ],
                'label' => 'Mot de passe',
                'required' => true,
                'label_attr' => [
                    'class' => 'form-label mt-3',
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 12,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        'max' => 4096,
                    ]),
                    new Regex([
                        'pattern' => '/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^\&;*_=+\-]).{12,4096}$/'
                    ]),
                    new PasswordStrength(),
                    new NotCompromisedPassword(),
                ],
            ])
            ->add('company', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                ],
                'label' => 'Nom de l\'entreprise',
                'label_attr' => [
                    'class' => 'form-label mt-3',
                ],
            ])
            ->add('occupation', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                ],
                'label' => 'Fonction',
                'label_attr' => [
                    'class' => 'form-label mt-3',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
            'csrf_protection' => true
        ]);
    }
}
