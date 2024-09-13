<?php

namespace App\Repositories\TipoDocumentacao;

use Illuminate\Support\ServiceProvider;

class TipoDocumentacaoServiceProvider extends ServiceProvider 
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
        $this->app->bind('App\Repositories\TipoDocumentacao\TipoDocumentacaoInterface', 'App\Repositories\TipoDocumentacao\TipoDocumentacaoRepository');
    }
}