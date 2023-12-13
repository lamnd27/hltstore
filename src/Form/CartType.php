<?php

namespace App\Form;

use App\Entity\Cart;
use App\Entity\Product;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CartType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('cquantity',TextType::class,[
                'label'=>'Product Quantity'
            ])
            ->add('cdate',DateTimeType::class,[
                'widget'=>'single_text',
                'required'=>false])
            ->add('cuserid',EntityType::class,[
                'class'=>User::class,
                'choice_label'=>'cname'
            ])
            ->add('cproid',EntityType::class,[
                'class'=>Product::class,
                'choice_label'=>'cname'
            ])
            ->add('save',SubmitType::class,[
                'label'=> 'Save'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Cart::class,
        ]);
    }
}
