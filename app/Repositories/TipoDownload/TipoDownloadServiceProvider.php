<?php

namespace App\Repositories\TipoDownload;

use Illuminate\Support\ServiceProvider;

class TipoDownloadServiceProvider extends ServiceProvider 
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
        $this->app->bind('App\Repositories\TipoDownload\TipoDownloadInterface', 'App\Repositories\TipoDownload\TipoDownloadRepository');
    }
}