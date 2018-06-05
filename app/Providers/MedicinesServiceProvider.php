<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class MedicinesServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Interfaces\MedicinesInterface', 'App\Repositories\MedicinesRepository');
    }
}
