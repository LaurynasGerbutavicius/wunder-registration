<?php
/**
 * Created by PhpStorm.
 * User: laurynas
 * Date: 18.10.7
 * Time: 15.55
 */

namespace App\Controller;


use App\Entity\Customer;
use App\Form\RegistrationFlow;
use App\Model\CustomerModel;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class RegistrationController extends Controller
{

    /**
     * @Route("/")
     * @return JsonResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function register(Request $request, CustomerModel $model)
    {
        $customer = new Customer();
        /* @var $flow RegistrationFlow */
        $flow = $this->get('App\Form\RegistrationFlow');
        $flow->bind($customer);
        $form = $flow->createForm();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $flow->saveCurrentStepData($form);

            if ($flow->nextStep()) {
                $form = $flow->createForm();
            } else {
                $model->register($customer);

                $flow->reset();

                return $this->render('registration_status.html.twig', [
                    'paymentDataId' => $customer->getPaymentDataId()
                ]);
            }
        }

        return $this->render('register.html.twig', [
            'form' => $form->createView(),
            'flow' => $flow
        ]);
    }

}