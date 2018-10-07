<?php
/**
 * Created by PhpStorm.
 * User: laurynas
 * Date: 18.10.7
 * Time: 16.01
 */

namespace App\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationBasicType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName')
            ->add('lastName')
            ->add('telephone');
    }


}