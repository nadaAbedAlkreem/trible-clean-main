<?php 

namespace App\Repositories\Eloquent;

use App\Models\ItemOrder;
use App\Repositories\IItemOrderRepository;
use App\Exceptions\ItemOrderException;

class ItemOrderRepository extends BaseRepository implements IItemOrderRepository
{
    public function __construct()
    {
        $this->model = new ItemOrder();
    }



    public function updateDeliveredQuantity($item)
    {
        // Validate if the item exists
        $itemOrder = ItemOrder::find($item['id']);
        if (!$itemOrder) {
            throw new ItemOrderException('ITEM_NOT_FOUND');
        }
    
        if ($item['delivered_quantity'] > $item['total_quantity']) {
            throw new ItemOrderException('INVALID_DELIVERED_QUANTITY');
        }
    
        $updateData = ['delivered_quantity' => $item['delivered_quantity']];
    
        if ($item['total_quantity'] == $item['delivered_quantity']) {
            $updateData['status'] = 'delivered';
        }else  
        if($item['delivered_quantity'] > 0 )
        {
            $updateData['status'] = 'partially_delivered';

        }
    
        return $itemOrder->update($updateData); // Use the found item order instance
    }
    
}