<?php



Route::group(['prefix' => config('nuntius.slug'), 'namespace' => 'Nuntius\Http\Controllers', 'middleware' => ['web']], function () {


    // Admin side of Nuntius
    Route::group(['middleware' => ['canUseNuntius']], function () {
        Route::get('create', 'CreateBlogController@createFormAction');
        Route::post('create', 'CreateBlogController@createAction');
    });




});