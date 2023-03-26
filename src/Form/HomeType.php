<?php

namespace App\Form;

use App\Entity\Home;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class HomeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder  //Fabriquer un formulaire ET Donner l'ordre aussi d'affichage
        ->add('isActive', CheckboxType::class, ["label"=>"Page Active?","row_attr"=>["class"=>"form-switch"],"required"=>false])
        ->add('title', TextType::class,["help"=>"Le titre de Produit", "help_attr"=>
            ["class"=>"text-white"],"label"=>"Le Titre", "required"=>true])
        ->add('text', CKEditorType::class, ["label"=>"Le Texte", "required"=>true])
        ->add('signature', TextType::class, ["label"=>"La Signature", "required"=>true])
        ->remove('updatedAt', )
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Home::class,
        ]);
    }
}
