<?php

namespace App\Form;

use App\Entity\Carousel;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class CarouselType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->remove('imageName')
            ->add('title',TextType::class, ["label"=>"Titre", "required"=>false]) 
            ->add('text', CKEditorType::class, ["label"=>"Desription du produit", "required"=>false ])
            ->add('imageFile',FileType::class, ["label"=>"image", "required"=>true])
            ->add('prix', MoneyType::class, [
                'currency' => 'EUR',
                'divisor' => 100,
                'scale' => 2,
                "required"=>false])
            ->add('tag', ChoiceType::class, ["label"=>"tag", "choices"=>[
                'home'=>'home',
                'bagues'=>'bagues',
                'bracelets'=>'bracelets',
                'colliers'=>'colliers',

/*                 ->remove('updatedAt', ) */
                ]]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Carousel::class,
        ]);
    }
}
