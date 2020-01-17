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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts/', 'PostsController@index')->name('post');
Route::get('/posts/insert','PostsController@store');
Route::post('/posts/', 'PostsController@create');
Route::get('/posts/form', 'PostsController@show')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
