<?php

namespace App\Form;

use App\Entity\Collier;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class CollierType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('title',TextType::class, ["label"=>"Titre", "required"=>false]) 
        ->remove('updatedAt')
        ->remove('imageName')
        ->add('imageFile',FileType::class, ["label"=>"image", "required"=>true])
        ->add('description', CKEditorType::class, ["label"=>"Desription du produit", "required"=>false ])
        ->remove('slug')
        ->add('prix', MoneyType::class, [
            'currency' => 'EUR',
            'divisor' => 100,
            'scale' => 2,
        ])
        ->add('tag', ChoiceType::class, ["label"=>"tag", "choices"=>[
            'home'=>'home',
            'bagues'=>'bagues',
            'bracelets'=>'bracelets',
            'colliers'=>'colliers',
            'pochettes'=>'pochettes'
            ]]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Collier::class,
        ]);
    }
}
