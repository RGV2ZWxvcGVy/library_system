<?php

namespace App\Form;

use App\Entity\Author;
use App\Entity\Book;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BookType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class,
                [ 'label' => 'Titel', 'attr' => [ 'class' => 'form-control' ], 'required' => true ])
            ->add('summary', TextareaType::class,
                [ 'label' => 'Samenvatting', 'attr' => [ 'class' => 'form-control' ], 'required' => false ])
            ->add('publicationDate', DateType::class,
                [ 'label' => 'Publicatiedatum', 'required' => true ])
            ->add('author', EntityType::class,
                [ 'label' => 'Auteur', 'class' => Author::class, 'attr' => [ 'class' => 'form-select' ], 'required' => true ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Book::class,
        ]);
    }
}
