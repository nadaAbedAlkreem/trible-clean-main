<?php

namespace App\Observers;

use App\Models\Update;

class UpdatesObserver
{
    /**
     * Handle the Update "created" event.
     *
     * @param  \App\Models\Update  $update
     * @return void
     */
    public function created(Update $update)
    {
        Cache::forget('operatingOrder_' . $update->operatingOrder_id);
    }

    /**
     * Handle the Update "updated" event.
     *
     * @param  \App\Models\Update  $update
     * @return void
     */
    public function updated(Update $update)
    {
        Cache::forget('operatingOrder_' . $update->operatingOrder_id);
    }

    /**
     * Handle the Update "deleted" event.
     *
     * @param  \App\Models\Update  $update
     * @return void
     */
    public function deleted(Update $update)
    {
        Cache::forget('operatingOrder_' . $update->operatingOrder_id);
    }

    /**
     * Handle the Update "restored" event.
     *
     * @param  \App\Models\Update  $update
     * @return void
     */
    public function restored(Update $update)
    {
        //
    }

    /**
     * Handle the Update "force deleted" event.
     *
     * @param  \App\Models\Update  $update
     * @return void
     */
    public function forceDeleted(Update $update)
    {
        //
    }
}
