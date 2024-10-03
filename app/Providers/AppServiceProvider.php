<?php

namespace App\Providers;


use App\Models\OperatingOrder;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Representative;
use App\Observers\OperatingOrderObserver;
use App\Observers\CustomerObserver;
use App\Observers\InvoiceObserver;
use App\Observers\RepresentativeObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        OperatingOrder::observe(OperatingOrderObserver::class);
        Customer::observe(CustomerObserver::class);
        Invoice::observe(InvoiceObserver::class);
        Representative::observe(RepresentativeObserver::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
