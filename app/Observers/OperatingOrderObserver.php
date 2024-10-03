<?php

namespace App\Observers;

use App\Models\OperatingOrder;
use Illuminate\Support\Facades\Cache;

class OperatingOrderObserver
{
    /**
     * Handle the OperatingOrder "created" event.
     *
     * @param  \App\Models\OperatingOrder  $operatingOrder
     * @return void
     */
    public function created(OperatingOrder $operatingOrder)
    {
        // Optionally clear cache if needed or handle new creation
        Cache::forget('operatingOrder_' . $operatingOrder->id);
    }

    public function updated(OperatingOrder $operatingOrder)
    {
        // Invalidate the cache when the operating order is updated
        Cache::forget('operatingOrder_' . $operatingOrder->id);
    }

    public function deleted(OperatingOrder $operatingOrder)
    {
        // Invalidate the cache when the operating order is deleted
        Cache::forget('operatingOrder_' . $operatingOrder->id);
    }
    /**
     * Handle the OperatingOrder "restored" event.
     *
     * @param  \App\Models\OperatingOrder  $operatingOrder
     * @return void
     */
    public function restored(OperatingOrder $operatingOrder)
    {
        //
    }

    /**
     * Handle the OperatingOrder "force deleted" event.
     *
     * @param  \App\Models\OperatingOrder  $operatingOrder
     * @return void
     */
    public function forceDeleted(OperatingOrder $operatingOrder)
    {
        //
    }
}
