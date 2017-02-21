<?php



Route::group(['prefix' => config('nuntius.slug'), 'namespace' => 'Nuntius\Http\Controllers', 'middleware' => ['web']], function () {


    // Admin side of Nuntius
    Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['canUseNuntius']], function () {
        Route::get('{route?}', 'AdminController@main')->where(['subs' => '.*']);
    });


});


// Api routes
Route::group(['prefix' => 'nuntius/api', 'namespace' => 'Nuntius\Http\Controllers\Api', 'middleware' => ['web']], function () {

    // Admin side of Nuntius
    Route::group(['middleware' => ['canUseNuntius']], function () {
        Route::post('post/create', 'CreatePostController@create');

        Route::get('posts', 'GetPostController@all');
    });

});