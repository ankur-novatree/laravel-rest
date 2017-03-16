<?php

namespace Novatree\RestModel;

use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use Novatree\RestModel\Services\RestModelServices;

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
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('restModel',function(){
           return new RestModelServices(new Request());
        });
    }
}
