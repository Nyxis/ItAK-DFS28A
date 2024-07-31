<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use App\Entity\Product;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ProductType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) 
    {
     $builder
        ->add('designation', TextType::class)
        ->add('univers', TextType::class)
        ->add('price', NumberType::class)
        ->add('submit', SubmitType::class)    
        ;
    } 
}

?>