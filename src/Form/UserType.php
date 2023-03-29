<?php

namespace App\Form;

use App\Entity\User;
use App\Form\UserType;
use GuzzleHttp\Client;
use App\Form\AvatarType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;


class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('sexe', ChoiceType::class, [ 
            'expanded' => true,
            'multiple' => false,
            'choices' => ['Monsieur' => 'Monsieur', 'Madame' => 'Madame'],
            'required' => true,
            'data' => true,
        ])
        ->add('email', EmailType::class, ["label" =>"Email"])
            /* ->add('roles') */
            /* ->add('password') */
            ->add('name', TextType::class, [
                'label' => 'Nom',
                'attr' => [
                'placeholder' => 'Entrez votre Nom'
                ]
                ])
            ->add('firstname', TextType::class, [
                'label' => 'Prénom',
                'attr' => [
                'placeholder' => 'Entrez votre Prénom'
                ]
                ])
            ->add('isVerified')
/*             ->add('pseudo',TextType::class,["label"=>"Pseudo","required" => false]) */
            ->add('address', TextType::class, [
            'label' => 'Adresse',
            'attr' => [
            'placeholder' => 'Entrez votre adresse'
            ]
            ])
            ->add('address2',TextType::class,["label"=>"Complément d'adresse","required" => false])
            ->add('zipCode',TextType::class,["label"=>"Code postal","required" => false])
            ->add('city',TextType::class,["label"=>"Ville","required" => false])
            ->add('country',CountryType::class,["label"=>"Pays","required" => false])
            ->add('phoneNumber',null,[
                'label' => 'Número de teléphone',
            ])
            ->add('avatar', AvatarType::class, ["label" => false])
            ->add('plainPassword', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'Les mots de passe ne sont pas identiques.',
                /* 'options' => ['attr' => ['class' => 'password-field']], */
                'required' => false,
                'first_options'  => ['label' => 'Mot de passe'],
                'second_options' => ['label' => 'Confirmation mot de passe'],
                'mapped' =>false
            ])
            ->add('save', SubmitType::class, ["label"=>"Sauvegarder","attr" =>["class" => "btn btn-outline-success d-flex justify-content-center"]])
        ;
    }





    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
