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
Route::get('/post/{slug}', 'PostController@show');

Route::group(['prefix' => 'dashboard','middleware' => ['role:admin']], function () {
    Route::get('/', 'DashboardController@index');

    Route::get('post/create', 'DashboardController@showCreateForm');
    Route::get('post/{post}', 'DashboardController@showEditForm');

    Route::post('post', 'PostController@store');
    Route::patch('post/{post}', 'PostController@patch');
    Route::delete('post/{post}', 'PostController@delete');
});