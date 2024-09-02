<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

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
                    'class' => 'form-label',
                ],
            ])
            ->add('phoneNumber', TelType::class, [
                'attr' => [
                    'class' => 'form-control',
                ],
                'label' => 'Numéro de téléphone',
                'label_attr' => [
                    'class' => 'form-label',
                ],
            ])
            ->add('email', EmailType::class, [
                'attr' => [
                    'class' => 'form-control',
                ],
                'label' => 'Adresse e-mail professionnelle',
                'required' => true,
                'label_attr' => [
                    'class' => 'form-label',
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
                    'class' => 'form-label',
                ],
            ])
            ->add('company', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                ],
                'label' => 'Nom de l\'entreprise',
                'label_attr' => [
                    'class' => 'form-label',
                ],
            ])
            ->add('occupation', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                ],
                'label' => 'Fonction',
                'label_attr' => [
                    'class' => 'form-label',
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
