<?php

namespace App\Repositories\Sistema;

use Illuminate\Support\ServiceProvider;

class SistemaServiceProvider extends ServiceProvider 
{
  /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        
    }


    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Repositories\Sistema\SistemaInterface', 'App\Repositories\Sistema\SistemaRepository');
    }
}