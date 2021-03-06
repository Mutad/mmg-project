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

Route::get('/',function(){
    return view('welcome');
});

// Categories
Route::resource('categories', 'CategoryController');
Route::get('categories/{category}/delete','CategoryController@destroy')->name('categories.destroy');


// Posts
Route::resource('posts', 'PostController');
Route::get('posts/create/{category_id}','PostController@create')->name('posts.create.with_id');
Route::get('posts/{post}/delete','PostController@destroy')->name('posts.destroy');

