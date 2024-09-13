<?php

namespace App\Repositories\Documentacao;

use Illuminate\Support\ServiceProvider;

class DocumentacaoServiceProvider extends ServiceProvider 
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
        $this->app->bind('App\Repositories\Documentacao\DocumentacaoInterface', 'App\Repositories\Documentacao\DocumentacaoRepository');
    }
}