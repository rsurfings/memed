<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class PharmacyServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Interfaces\PharmacyInterface', 'App\Repositories\PharmacyRepository');
    }
}
