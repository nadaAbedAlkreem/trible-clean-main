<?php

namespace App\Repositories\Eloquent;

use App\Models\Payment;
use App\Repositories\IPaymentRepository;

class PaymentRepository extends BaseRepository implements IPaymentRepository
{
    public function __construct()
    {
        $this->model = new Payment();
    }
    public function getTotalAmountByOperatingOrder($operatingOrderId)
{
    return $this->model
        ->where('operating_order_id', $operatingOrderId)
        ->sum('amount');
}

 
}