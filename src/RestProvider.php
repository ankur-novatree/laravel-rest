<?php

namespace Novatree\Rest;

use Illuminate\Support\ServiceProvider;

class RestProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        include __DIR__.'/routes.php';
    }

    /**
     * Register the RestServices class with the rest name.
     * RestFacade will get the instance by this name.
     *
     * @return void
     */
    public function register()
    {
    }
}
