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

class CustomerModel
{
    public function __construct(CustomerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function register(Customer &$customer)
    {
        $this->repository->save($customer);
    }

}