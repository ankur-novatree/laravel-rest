<?php
/**
 *  Using Laravel Route Facade  here the all routes has been grouped with prefix with rest
 *  and the namespace Novatree\RestModel\Controllers.
 *
 *
 *  by name all/{model} this route of GET type invokes RestModelControllers all() method.
 *  by name find/{model}/{id} this route of GET type invokes RestModelControllers show() method.
 *  by name update/{model}/{id} this route of PUT type invokes RestModelControllers update() method.
 *
 *
 *  by name create/{model} this route of POST type invokes RestModelControllers create() method.
 *  by name delete/{model}/{id} this route of DELETE type invokes RestModelControllers delete() method.
 *
 *
 */

Route::group(['prefix' =>'rest','namespace'=>
    'Novatree\Rest\Controllers'], function () {
        Route::get('{model}', 'RestModelController@all');
        Route::get('{model}/{id}', 'RestModelController@show');
        Route::put('{model}/{id}', 'RestModelController@update');
        Route::post('{model}', 'RestModelController@create');
        Route::delete('{model}/{id}', 'RestModelController@delete');
    });
