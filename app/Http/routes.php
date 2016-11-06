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
Route::auth();

Route::get('/', 'PostController@index');
Route::get('posts/{slug}', 'PostController@show');

Route::group(['prefix' => 'dashboard', 'middleware' => ['role:admin']], function () {
    Route::get('/', 'DashboardController@index');

    Route::get('posts', 'DashboardController@index');
    Route::get('posts/create', 'DashboardController@showCreateForm');
    Route::get('posts/{post}', 'DashboardController@showEditForm');

    Route::post('posts', 'PostController@store');
    Route::patch('posts/{post}', 'PostController@patch');
    Route::delete('posts/{post}', 'PostController@delete');


    Route::get('photos', 'PhotoController@index');
    Route::get('photos/create', 'PhotoController@create');
    Route::get('photos/{photo}', 'PhotoController@view');
    Route::get('photos/{photo}/edit', 'PhotoController@edit');

    Route::post('photos', 'PhotoController@store');
    Route::patch('photos/{photo}', 'PhotoController@patch');
    Route::delete('photos/{photo}', 'PhotoController@delete');
});

