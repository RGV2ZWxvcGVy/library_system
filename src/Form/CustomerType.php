<?php

namespace App\Form;

use App\Entity\Customer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CustomerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class,
                [ 'label' => 'Naam', 'attr' => [ 'class' => 'form-control' ], 'required' => true ])
            ->add('email', EmailType::class,
                [ 'label' => 'E-mailadres', 'attr' => [ 'class' => 'form-control' ], 'required' => true ])
            ->add('phone', TextType::class,
                [ 'label' => 'Telefoon', 'attr' => [ 'class' => 'form-control' ], 'required' => false ])
            ->add('postalCode', TextType::class,
                [ 'label' => 'Postcode', 'attr' => [ 'class' => 'form-control' ], 'required' => true ])
            ->add('houseNumber', TextType::class,
                [ 'label' => 'Huisnummer', 'attr' => [ 'class' => 'form-control' ], 'required' => true ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Customer::class,
        ]);
    }
}
