<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Product;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('pname',TextType::class,[
            'label'=>'Product Name'
        ])
        ->add('pdesc',TextType::class,[
            'label'=>'Product Description'
        ])
        // ->add('pquan',TextType::class,[
        //     'label'=>'Product Quantity'
        // ])
        ->add('price')
        ->add('ifile',FileType::class,[
            'required'=>false,
            'label'=> 'Insert an image',
            'mapped'=>false
        ])
        // ->add('pcreated',DateTimeType::class,[
        //     'widget'=>'single_text',
        //     'required'=>false])
        ->add('cat',EntityType::class,[
            'class'=>Category::class,
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
            'data_class' => Product::class,
        ]);
    }
}
