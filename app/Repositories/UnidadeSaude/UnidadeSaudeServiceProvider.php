<?php

namespace App\Repositories\UnidadeSaude;

use Illuminate\Support\ServiceProvider;

class UnidadeSaudeServiceProvider extends ServiceProvider 
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
        $this->app->bind('App\Repositories\UnidadeSaude\UnidadeSaudeInterface', 'App\Repositories\UnidadeSaude\UnidadeSaudeRepository');
    }
}