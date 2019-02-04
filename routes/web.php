<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', ['as' => 'web', 'uses' => 'PublicController@index']);

Route::group(['prefix' => 'posts', 'middleware' => 'web'], function ()
{

    Route::get('/', ['as' => 'posts.list', 'uses' => 'PostController@index']);
    Route::get('/add', ['as' => 'posts.add', 'uses' => 'PostController@add']);
    Route::get('/edit', ['as' => 'posts.edit', 'uses' => 'PostController@edit']);

    Route::post('/store', ['as' => 'posts.store', 'uses' => 'PostController@store']);
    Route::post('/update', ['as' => 'posts.update', 'uses' => 'PostController@update']);
    Route::post('/destroy', ['as' => 'posts.destroy', 'uses' => 'PostController@destroy']);

});