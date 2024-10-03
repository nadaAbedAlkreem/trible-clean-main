<?php

namespace App\Observers;

use App\Models\ItemOrder;

class OrderItemsObserver
{
    /**
     * Handle the ItemOrder "created" event.
     *
     * @param  \App\Models\ItemOrder  $itemOrder
     * @return void
     */
    public function created(ItemOrder $itemOrder)
    {
        Cache::forget('operatingOrder_' . $itemOrder->operatingOrder_id);
        Cache::forget('orderItems_' . $itemOrder->operating_order_id);

     }

    /**
     * Handle the ItemOrder "updated" event.
     *
     * @param  \App\Models\ItemOrder  $itemOrder
     * @return void
     */
    public function updated(ItemOrder $itemOrder)
    {
        Cache::forget('operatingOrder_' . $itemOrder->operatingOrder_id);
        Cache::forget('orderItems_' . $itemOrder->operating_order_id);

    }

    /**
     * Handle the ItemOrder "deleted" event.
     *
     * @param  \App\Models\ItemOrder  $itemOrder
     * @return void
     */
    public function deleted(ItemOrder $itemOrder)
    {
        Cache::forget('operatingOrder_' . $itemOrder->operatingOrder_id);
        Cache::forget('orderItems_' . $itemOrder->operating_order_id);

    }

    /**
     * Handle the ItemOrder "restored" event.
     *
     * @param  \App\Models\ItemOrder  $itemOrder
     * @return void
     */
    public function restored(ItemOrder $itemOrder)
    {
        //
    }

    /**
     * Handle the ItemOrder "force deleted" event.
     *
     * @param  \App\Models\ItemOrder  $itemOrder
     * @return void
     */
    public function forceDeleted(ItemOrder $itemOrder)
    {
        //
    }
}
