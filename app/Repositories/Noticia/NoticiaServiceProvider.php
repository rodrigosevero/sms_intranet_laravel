<?php

namespace App\Repositories\Noticia;

use Illuminate\Support\ServiceProvider;

class NoticiaServiceProvider extends ServiceProvider 
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
        $this->app->bind('App\Repositories\Noticia\NoticiaInterface', 'App\Repositories\Noticia\NoticiaRepository');
    }
}