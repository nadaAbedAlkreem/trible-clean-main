<?php

namespace App\Observers;

use App\Models\Representative;

class RepresentativeObserver
{
    /**
     * Handle the Representative "created" event.
     *
     * @param  \App\Models\Representative  $representative
     * @return void
     */
    public function created(Representative $representative)
    {
        Cache::forget('operatingOrder_' . $representative->operatingOrder_id);
    }

    /**
     * Handle the Representative "updated" event.
     *
     * @param  \App\Models\Representative  $representative
     * @return void
     */
    public function updated(Representative $representative)
    {
        Cache::forget('operatingOrder_' . $representative->operatingOrder_id);
    }

    /**
     * Handle the Representative "deleted" event.
     *
     * @param  \App\Models\Representative  $representative
     * @return void
     */
    public function deleted(Representative $representative)
    {
        Cache::forget('operatingOrder_' . $representative->operatingOrder_id);
    }

    /**
     * Handle the Representative "restored" event.
     *
     * @param  \App\Models\Representative  $representative
     * @return void
     */
    public function restored(Representative $representative)
    {
        //
    }

    /**
     * Handle the Representative "force deleted" event.
     *
     * @param  \App\Models\Representative  $representative
     * @return void
     */
    public function forceDeleted(Representative $representative)
    {
        //
    }
}
