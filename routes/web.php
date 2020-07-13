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

// Categories
Route::group(['prefix' => 'categories'], function () {
    // Read
    Route::get('/', 'CategoryController@index')->name('categories.index');
    Route::get('/{category}', 'CategoryController@show')->name('categories.show');

    // Create
    Route::get('/create', 'CategoryController@create')->name('categories.create');
    Route::post('/', 'CategoryController@store')->name('categories.store');

    // Update
    Route::get('/{category}/edit', 'CategoryController@edit')->name('categories.edit');
    Route::put('/{category}', 'CategoryController@update')->name('categories.update');

    // Delete
    Route::delete('/{category}', 'CategoryController@destroy')->name('categories.destroy');
});

// Posts
Route::group(['prefix' => 'posts'], function () {
    //Read
    Route::get('/{post}', 'PostController@show')->name('posts.show');

    //Create
    Route::get('/create','PostController@create')->name('posts.create');
    Route::post('/','PostController@store')->name('posts.store');

    //Update
    Route::get('/{post}/edit','PostController@edit')->name('posts.edit');
    Route::put('/{post}','PostController@update')->name('posts.update');

    //Delete
    Route::delete('/{post}','PostController@destroy')->name('posts.destroy');
});
