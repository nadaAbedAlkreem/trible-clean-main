<?php 

namespace App\Repositories\Eloquent;

use App\Models\ItemOrder;
use App\Repositories\IItemOrderRepository;

class ItemOrderRepository extends BaseRepository implements IItemOrderRepository
{
    public function __construct()
    {
        $this->model = new ItemOrder();
    }
    
 
}