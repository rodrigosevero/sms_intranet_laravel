<?php

namespace App\Repositories\Download;

use Illuminate\Support\ServiceProvider;

class DownloadServiceProvider extends ServiceProvider 
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
        $this->app->bind('App\Repositories\Download\DownloadInterface', 'App\Repositories\Download\DownloadRepository');
    }
}