<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class CheckoutServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Interfaces\CheckoutInterface', 'App\Repositories\CheckoutRepository');
    }
}
