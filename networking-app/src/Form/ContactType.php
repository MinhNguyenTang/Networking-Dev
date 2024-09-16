<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Nom',
                ],
                'required' => true,
                'label' => 'Nom *',
                'label_attr' => [
                    'class' => 'form-label',
                ],
                'constraints' => [
                    New NotBlank(),
                ],
            ])
            ->add('firstname', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Prénom',
                ],
                'required' => true,
                'label' => 'Prénom *',
                'label_attr' => [
                    'class' => 'form-label',
                ],
                'constraints' => [
                    New NotBlank(),
                ],
            ])
            ->add('email', EmailType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'E-mail professionnel',
                ],
                'required' => true,
                'label' => 'E-mail professionnel *',
                'label_attr' => [
                    'class' => 'form-label',
                ],
                'constraints' => [
                    New NotBlank(),
                ],
            ])
            ->add('phoneNumber', TelType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Téléphone',
                ],
                'required' => true,
                'label' => 'Téléphone *',
                'label_attr' => [
                    'class' => 'form-label',
                ],
                'constraints' => [
                    New Regex([
                        'pattern' => '/^(?:(?:\+|00)33[\s.-]{0,3}(?:\(0\)[\s.-]{0,3})?|0)[1-9](?:(?:[\s.-]?\d{2}){4}|\d{2}(?:[\s.-]?\d{3}){2})$/',
                    ]),
                ],
            ])
            ->add('company', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Nom de l\'entreprise',
                ],
                'required' => true,
                'label' => 'Nom de l\'entreprise *',
                'label_attr' => [
                    'class' => 'form-label',
                ],
            ])
            ->add('occupation', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Intitulé du poste',
                ],
                'required' => true,
                'label' => 'Intitulé du poste *',
                'label_attr' => [
                    'class' => 'form-label',
                ],
            ])
            ->add('companySize', ChoiceType::class, [
                'attr' => [
                    'class' => 'form-select',
                ],
                'choices' => [
                    '-- Sélectionnez la taille de l\'entreprise --' => null,
                    '1 - 25' => '1 - 25',
                    '26 - 50' => '26 - 50',
                    '51 - 100' => '51 - 100',
                    '101 - 500' => '101 - 500',
                    '501 - 1000' => '501 - 1000',
                    'Plus de 1000' => 'Plus de 1000',
                ],
                'label' => 'Taille de l\'entreprise',
                'label_attr' => [
                    'class' => 'form-label',
                ],
            ])
            ->add('businessLine', ChoiceType::class, [
                'attr' => [
                    'class' => 'form-select',
                ],
                'choices' => [
                    '-- Sélectionnez le secteur d\'activité --' => null,
                    'RH' => 'RH',
                    'Santé' => 'Santé',
                    'Education' => 'Education',
                    'Industrie' => 'Industrie',
                    'Immobilier' => 'Immobilier',
                    'Informatique' => 'Informatique',
                    'Autre' => 'Autre',
                ],
                'label' => 'Secteur d\'activité',
                'label_attr' => [
                    'class' => 'form-label',
                ],
            ])
            ->add('message', TextareaType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'rows' => 10,
                    'placeholder' => 'Votre message'
                ],
                'required' => true,
                'label' => 'Description de votre demande *',
                'label_attr' => [
                    'class' => 'form-label',
                ],
            ])
            ->add('submit', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-primary mt-4',
                ],
                'label' => 'Envoyer ma demande',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
            'csrf_protection' => true
        ]);
    }
}
