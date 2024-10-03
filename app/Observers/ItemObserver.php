<?php

namespace App\Observers;

use App\Models\Item;
use App\Models\ItemOrder;

class ItemObserver
{
    /**
     * Handle the Item "created" event.
     *
     * @param  \App\Models\Item  $item
     * @return void
     */
    public function created(Item $item  ,ItemOrder  $itemOrder)
    {  
        Cache::forget('operatingOrder_' . $itemOrder->operatingOrder_id);
        Cache::forget('orderItems_' . $itemOrder->operating_order_id);

    }

    /**
     * Handle the Item "updated" event.
     *
     * @param  \App\Models\Item  $item
     * @return void
     */
    public function updated(Item $item,ItemOrder  $itemOrder)
    {  
        Cache::forget('operatingOrder_' . $itemOrder->operatingOrder_id);
        Cache::forget('orderItems_' . $itemOrder->operating_order_id);

    }
    /**
     * Handle the Item "deleted" event.
     *
     * @param  \App\Models\Item  $item
     * @return void
     */
    public function deleted(Item $item,ItemOrder  $itemOrder)
    {  
        Cache::forget('operatingOrder_' . $itemOrder->operatingOrder_id);
        Cache::forget('orderItems_' . $itemOrder->operating_order_id);

    }
    /**
     * Handle the Item "restored" event.
     *
     * @param  \App\Models\Item  $item
     * @return void
     */
    public function restored(Item $item)
    {
        //
    }

    /**
     * Handle the Item "force deleted" event.
     *
     * @param  \App\Models\Item  $item
     * @return void
     */
    public function forceDeleted(Item $item)
    {
        //
    }
}
