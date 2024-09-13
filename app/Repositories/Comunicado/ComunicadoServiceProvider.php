<?php

namespace App\Repositories\Comunicado;

use Illuminate\Support\ServiceProvider;

class ComunicadoServiceProvider extends ServiceProvider 
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
        $this->app->bind('App\Repositories\Comunicado\ComunicadoInterface', 'App\Repositories\Comunicado\ComunicadoRepository');
    }
}