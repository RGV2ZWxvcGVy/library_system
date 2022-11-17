<?php

namespace App\Form;

use App\Entity\Book;
use App\Entity\Customer;
use App\Entity\Loan;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LoanType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
//            ->add('book', EntityType::class,
//                [ 'label' => 'Boek', 'class' => Book::class, 'attr' => [ 'class' => 'form-select' ], 'required' => true ])
            ->add('customer', EntityType::class,
                [ 'label' => 'Klant', 'class' => Customer::class, 'attr' => [ 'class' => 'form-select' ], 'required' => true ])
            ->add('startDate', DateTimeType::class,
                [ 'label' => 'Uitgeleend op', 'required' => true ])
            ->add('endDate', DateTimeType::class,
                [ 'label' => 'Uitgeleend tot', 'required' => true ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Loan::class,
        ]);
    }
}
