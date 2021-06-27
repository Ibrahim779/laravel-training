<?php

namespace App\Providers;

use App\Services\Payment\MyFatorah\MyFatorah;
use App\Services\Payment\PaymentGatewayInterface;
use Illuminate\Support\ServiceProvider;

class PaymentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(PaymentGatewayInterface::class, MyFatorah::class);
    }
}
