<?php

namespace Blinqpackage\SmartpayRouter;

use Illuminate\Support\ServiceProvider;
use Blinqpackage\SmartpayRouter\SmartPay;

class SmartpayServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */


    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/config/paymentRouter.php' => config_path('paymentRouter.php')
        ]);
    }

    public function register()
    {
        $this->app->singleton(SmartPay::class, function () {
            return new SmartPay();
        });
    }
}
