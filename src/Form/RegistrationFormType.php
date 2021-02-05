<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('prenom', null,
                [
                    'attr' => [
                        'class' => 'form-control form_input',
                        'placeholder' => 'Veuillez saisir votre prénom svp !',
                        'error_bubbling' => true,
                        'autofocus' => true
                    ]
                ])
            ->add('nom', null,
                [
                    'attr' => [
                        'class' => 'form-control form_input',
                        'placeholder' => 'Veuillez saisir votre nom svp !'
                    ],
                    'error_bubbling' => true
                ])
            ->add('email', EmailType::class,
                [
                    'attr' => [
                        'class' => 'form-control form_input',
                        'placeholder' => 'Saisir votre email de connexion !'
                    ],
                    'error_bubbling' => true
                ])
            ->add('plainPassword', RepeatedType::class, [
                'type' => PasswordType::class,
                'first_options' => [
                    'constraints' => [
                        new NotBlank([
                            'message' => 'Please enter a password',
                        ]),
                        new Length([
                            'min' => 6,
                            'minMessage' => 'Your password should be at least {{ limit }} characters',
                            // max length allowed by Symfony for security reasons
                            'max' => 4096,
                        ]),
                    ],
                    'label' => 'Mot de passe',
                    'attr' => [
                        'placeholder' => 'Saisir votre mot de passe !',
                        'class' => 'form-control form_input'
                    ]
                ],
                'second_options' => [
                    'label' => 'Repetez le mot de passe',
                    'attr' => [
                        'placeholder' => 'Repetez la saisie de votre mot de passe !',
                        'class' => 'form-control form_input'
                    ]
                ],
                'invalid_message' => 'The password fields must match.',
                // Instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'error_bubbling' => true
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'You should agree to our terms.',
                    ]),

                ],
                'label' => 'Accepter les termes',
                'label_attr' => [
                    'class' => 'form-check-label'
                ],
                'attr' => [
                    'class' => 'form-check-input'
                ],
                'error_bubbling' => true
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}