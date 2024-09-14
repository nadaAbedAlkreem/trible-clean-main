<?php

namespace App\Repositories\Eloquent;

//ICustomerRepository
use App\Models\Customer;
use App\Repositories\ICustomerRepository;


class CustomerRepository   extends BaseRepository implements ICustomerRepository
{

    public function __construct()
    {
        $this->model = new Customer();
    }
    

  
}