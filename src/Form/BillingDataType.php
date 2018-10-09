<?php

namespace App\Form;

use App\Entity\BillingData;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BillingDataType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('is_company', CheckboxType::class, ['label' => 'Firma'])
            ->add('company',TextType::class, ['label' => 'Nazwa firmy'])
            ->add('address',TextType::class, ['label' => 'Adres'])
            ->add('post_code',TextType::class, ['label' => 'Kod pocztowy'])
            ->add('city',TextType::class, ['label' => 'Miasto'])
            ->add('nip',NumberType::class, ['label' => 'NIP'])
            ->add('regon',NumberType::class, ['label' => 'Regon'])
            ->add('name_surname',TextType::class, ['label' => 'Imię i Nazwisko'])
            ->add('phone',TextType::class, ['label' => 'Telefon'])
            ->add('email',EmailType::class, ['label' => 'E-mail'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => BillingData::class,
        ]);
    }
}
