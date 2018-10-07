<?php
/**
 * Created by PhpStorm.
 * User: laurynas
 * Date: 18.10.7
 * Time: 16.02
 */

namespace App\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationAddressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('street')
            ->add('house')
            ->add('zip')
            ->add('city');
    }


}