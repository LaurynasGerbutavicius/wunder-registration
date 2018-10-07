<?php
/**
 * Created by PhpStorm.
 * User: laurynas
 * Date: 18.10.7
 * Time: 17.19
 */

namespace App\Model;


use App\Entity\Customer;
use App\Repository\CustomerRepository;
use GuzzleHttp\Client;
use Symfony\Component\HttpFoundation\Response;

class CustomerModel
{
    public function __construct(CustomerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function register(Customer &$customer)
    {
        $this->repository->save($customer);
        $gotPaymentId = $this->registerPaymentData($customer);

        return $gotPaymentId;
    }

    private function registerPaymentData(Customer $customer)
    {
        $client = new Client();

        try {
            $response = $client->post(getenv('PAYMENT_API_URL'), [
                'form_params' => [
                    'customerId' => $customer->getId(),
                    'iban' => $customer->getIban(),
                    'owner' => $customer->getOwner()
                ]
            ]);
        } catch (\Exception $e) {
            return false;
        }

        $content = $response->getBody()->getContents();
        if ($response->getStatusCode() === Response::HTTP_OK) {
            $paymentDataId = $content['paymentDataId'];
            $customer->setPaymentDataId($paymentDataId);
            $this->repository->update($customer);
            return true;
        } else {
            return false;
        }
    }

}