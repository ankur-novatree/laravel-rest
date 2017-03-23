<?php

namespace Novatree\Rest;

use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use Novatree\Rest\Services\RestServices;

class RestServiceProvider extends ServiceProvider
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
        $this->app->singleton('rest', function () {
            return new RestServices(new Request());
        });
    }
}
