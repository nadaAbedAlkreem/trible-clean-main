<?php

namespace App\Repositories\Eloquent;

use App\Models\PurchaseOrder;
use App\Repositories\IPurchaseOrderRepository;

class PurchaseOrderRepository extends BaseRepository implements IPurchaseOrderRepository
{
    public function __construct()
    {
        $this->model = new PurchaseOrder();
    }
    
 
}