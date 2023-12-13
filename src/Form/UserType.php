<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('username',TextType::class,[
                'label'=>'User Name'
                ])
            ->add('password',TextType::class,[
                'label'=>'Password'
                ])
            ->add('hometown',TextType::class,[
                'label'=>'Hometown'
                ])
            ->add('phonenum',TextType::class,[
                'label'=>'Phone Number'
                ])
            ->add('state')
            ->add('save',SubmitType::class,[
                'label'=> 'Save'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
