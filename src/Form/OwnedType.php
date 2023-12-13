<?php

namespace App\Form;

use App\Entity\Branch;
use App\Entity\Owned;
use App\Entity\Product;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OwnedType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('opquan',TextType::class,[
                'label'=>'Product Quantity'
            ])
            ->add('opcreated',DateTimeType::class,[
                'widget'=>'single_text',
                'required'=>false])
            ->add('oproid',EntityType::class,[
                'class'=>Product::class,
                'choice_label'=>'pname'
            ])
            ->add('obranchid',EntityType::class,[
                'class'=>Branch::class,
                'choice_label'=>'bname'
            ])
            ->add('save',SubmitType::class,[
                'label'=> 'Save'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Owned::class,
        ]);
    }
}
