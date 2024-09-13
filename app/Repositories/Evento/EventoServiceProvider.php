<?php

namespace App\Repositories\Evento;

use Illuminate\Support\ServiceProvider;

class EventoServiceProvider extends ServiceProvider 
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
        $this->app->bind('App\Repositories\Evento\EventoInterface', 'App\Repositories\Evento\EventoRepository');
    }
}