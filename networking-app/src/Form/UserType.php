<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $field = $options['field'];

        switch($field) {
            case 'fullName':
                $builder->add('fullName', TextType::class, [

                ]);
                break;
            case 'phoneNumber':
                $builder->add('phoneNumber', TelType::class, [

                ]);
                break;
            case 'email':
                $builder->add('email', EmailType::class, [

                ]);
                break;
            case 'password':
                $builder->add('password', RepeatedType::class, [
                    'type' => PasswordType::class,
                    'invalid_message' => 'The password fields must match.',
                    'required' => true,
                    'first_options'  => [
                        'attr' => [
                            'class' => 'form-control',
                            'pattern' => '/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&;*_=+\-]).{10, 65}$/'
                        ],
                        'label' => 'Saisir votre nouveau mot de passe',
                        'label_attr' => [
                            'class' => "form-label"
                        ],
                    ],
                    'second_options' => [
                        'attr' => [
                            'class' => 'form-control',
                        ],
                        'label' => 'Confirmer le nouveau mot de passe',
                        'label_attr' => [
                            'class' => "form-label"
                        ],
                    ],
                ]);
                break;
            case 'company':
                $builder->add('company', TextType::class, [

                ]);
                break;
            case 'occupation':
                $builder->add('occupation', TextType::class, [
                
                ]);
                break;
            default:
                throw new \InvalidArgumentException('Champ non valide');
        }
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
            'csrf_protection' => true,
            'field' => null,
        ]);

        $resolver->setAllowedTypes('field', ['string', 'null']);
    }
}
