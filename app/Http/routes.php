<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => ['web']], function() {

    Route::auth();

    Route::get('/', 'HomeController@index');

    Route::get('posts/{id}-{slug}', [
        'as' => 'posts.show',
        'uses' => 'PostsController@show'
    ]);

    Route::resource('posts', 'PostsController', ['except' => ['show'], 'middleware' => ['auth']]);
    Route::get('posts/unpublished', 'PostsController@unpublished');

    Route::get('posts/rss.xml', 'FeedsController@index');

    Route::get('tags/{slug}', [
        'as' => 'tags.show',
        'uses' => 'TagsController@show'
    ]);
    Route::get('tags/{slug}/rss.xml', 'FeedsController@tags');

    Route::get('/home', 'HomeController@index');

});