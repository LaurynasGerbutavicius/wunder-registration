<?php
/**
 * Created by PhpStorm.
 * User: laurynas
 * Date: 18.10.7
 * Time: 15.56
 */

namespace App\Form;


use App\Form\Type\RegistrationAddressType;
use App\Form\Type\RegistrationBasicType;
use App\Form\Type\RegistrationPaymentType;
use Craue\FormFlowBundle\Form\FormFlow;

class RegistrationFlow extends FormFlow
{

    protected function loadStepsConfig()
    {
        return array(
            array(
                'label' => 'basic',
                'form_type' => RegistrationBasicType::class,
            ),
            array(
                'label' => 'address',
                'form_type' => RegistrationAddressType::class,
            ),
            array(
                'label' => 'payment',
                'form_type' => RegistrationPaymentType::class,
            ),
        );
    }
}