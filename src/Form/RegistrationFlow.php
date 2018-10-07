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
                'label' => 'Insert personal information',
                'form_type' => RegistrationBasicType::class,
            ),
            array(
                'label' => 'Insert address information',
                'form_type' => RegistrationAddressType::class,
            ),
            array(
                'label' => 'Insert payment information',
                'form_type' => RegistrationPaymentType::class,
            ),
        );
    }
}