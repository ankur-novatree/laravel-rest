<?php

namespace Novatree\Rest;

use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use Novatree\Rest\Services\RestModelServices;

class RestModelServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       include __DIR__.'/routes.php';
        //
    }

    /**
     * Register the RestModelServices class with the restModel name.
     * RestFacade will get the instance by this name.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('rest',function(){
           return new RestModelServices(new Request());
        });
    }
}
