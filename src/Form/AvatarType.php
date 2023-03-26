<?php

namespace App\Form;

use App\Entity\Avatar;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class AvatarType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('imageFile', FileType::class, [
            "label" => "Avatar", 
            "required" => false , 
            "help"=>"L'image doit faire 100px de large et de haut au minimun 
            et 200px de large et de haut au maximum."])
            
            
        /* ->add('imageName') */
        /* ->add('updatedAt') */
        /* ->add('user') */
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Avatar::class,
        ]);
    }
}
