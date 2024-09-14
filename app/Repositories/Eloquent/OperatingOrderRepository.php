<?php

namespace App\Repositories\Eloquent;

use App\Models\OperatingOrder;
use App\Repositories\IOperatingOrderRepository;

class OperatingOrderRepository extends BaseRepository implements IOperatingOrderRepository
{
    public function __construct()
    {
        $this->model = new OperatingOrder();
    }
    
 
}