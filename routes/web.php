<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'category'], function () {
    Route::get('/', 'CategoryController@index')->name('categories');
    Route::get('/{id}', 'CategoryController@show')->where('id', '[0-9]+');

    Route::get('/create', 'CategoryController@create');
    Route::post('/create', 'CategoryController@store');

    Route::get('/edit/{id}', 'CategoryController@edit')->where('id', '[0-9]+');
    Route::put('/edit/{id}', 'CategoryController@update')->where('id', '[0-9]+');

    Route::delete('/{id}', 'CategoryController@destroy')->where('id', '[0-9]+');
});
