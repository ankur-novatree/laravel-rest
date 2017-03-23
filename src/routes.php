<?php
/**
 *  Using Laravel Route Facade  here the all routes has been grouped with prefix with rest
 *  and the namespace Novatree\Rest\Controllers.
 *
 *
 *  by name all/{model} this route of GET type invokes RestControllers all() method.
 *  by name find/{model}/{id} this route of GET type invokes RestControllers show() method.
 *  by name update/{model}/{id} this route of PUT type invokes RestControllers update() method.
 *
 *
 *  by name create/{model} this route of POST type invokes RestControllers create() method.
 *  by name delete/{model}/{id} this route of DELETE type invokes RestControllers delete() method.
 *
 *
 */

Route::group(['prefix' =>'rest','namespace'=>
    'Novatree\Rest\Controllers'], function () {
        Route::get('{model}', 'RestController@all');
        Route::get('{model}/{id}', 'RestController@show');
        Route::put('{model}/{id}', 'RestController@update');
        Route::post('{model}', 'RestController@create');
        Route::delete('{model}/{id}', 'RestController@delete');
    });
