<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Filesystem\FilesystemManager;

class AppServiceProvider extends ServiceProvider
{



    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       //Show user IP in every page
       $clientip = \Request::getClientIp(true);
       View::share('clientip', $clientip);
       Storage::extend('fileolh', function ($app, $config) {
        return new FilesystemManager($config);
    });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
