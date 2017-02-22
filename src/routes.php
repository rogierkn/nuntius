<?php



Route::group(['prefix' => config('nuntius.slug'), 'namespace' => 'Nuntius\Http\Controllers', 'middleware' => ['web', 'auth']], function () {


    // Admin side of Nuntius
    Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => [\Nuntius\Http\Middleware\CanAdminNuntius::class]], function () {
        Route::get('{route?}', 'AdminController@main')->where(['subs' => '.*']);
    });


});


// Api routes
Route::group(['prefix' => 'nuntius/api', 'namespace' => 'Nuntius\Http\Controllers\Api', 'middleware' => ['web', \Nuntius\Http\Middleware\CanAdminNuntius::class]], function () {

    // Admin side of Nuntius
    Route::group([], function () {
        Route::post('post/create', 'Post\CreateController@create');

        Route::get('posts', 'Post\GetController@all');
        Route::get('post/{post}', 'Post\GetController@one');
        Route::put('post/{post}', 'Post\SaveController@save');

        Route::put('post/{post}/published/toggle', 'Post\PublishedController@toggle');
    });

});