<?php
/**
 * Created by PhpStorm.
 * User: laurynas
 * Date: 18.10.7
 * Time: 16.03
 */

namespace App\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationPaymentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('owner')
            ->add('iban');
    }

}