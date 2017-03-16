<?php

Route::group(['prefix' =>'rest','namespace'=>
    'Novatree\RestModel\Controllers']
,function (){
        Route::get('all/{model}','RestModelController@all');
        Route::get('find/{model}/{id}','RestModelController@show');
        Route::put('update/{model}/{id}','RestModelController@update');
        Route::post('create/{model}','RestModelController@create');
        Route::delete('delete/{model}/{id}','RestModelController@delete');

    });








?>