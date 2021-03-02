<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', EmailType::class, [
                'constraints' => [
                    new Email(array("message" => "Username must be an email address")),
                    new NotBlank([
                        'message' => 'Username is missing'
                    ])
                ]
            ])
            ->add('password', PasswordType::class, [
                'mapped' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Password is missing'
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Password should be at least {{ limit }} characters',
                        'max' => 25,
                    ])
                ]
            ])
            ->add('email', EmailType::class, [
                'constraints' => [
                    new Email(array("message" => "Email is not valid")),
                    new NotBlank([
                        'message' => 'Email is missing'
                    ]),
                ]
            ])
            ->add('firstName', TextType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'First Name is missing'
                    ])
                ]
            ])
            ->add('lastName', TextType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Last Name is missing'
                    ]),
                ]
            ])
            ->add('phoneNumber', NumberType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Phone Number is missing'
                    ])
                ]
            ])
            ->add('pesel', NumberType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Pesel is missing'
                    ]),
                    new Length([
                        'min' => 11,
                        'minMessage' => 'Pesel should be at least {{ limit }} characters',
                        'max' => 11
                    ])
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
