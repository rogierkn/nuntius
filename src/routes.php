<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => config('nuntius.slug'), 'namespace' => 'Nuntius\Http\Controllers'], function () {


    // Admin side of Nuntius
    Route::group(['middleware' => \Nuntius\Http\Middleware\CanUseNuntius::class], function () {
        Route::get('create', 'CreateBlogController@createFormAction');
        Route::post('create', 'CreateBlogController@createAction');
    });




});