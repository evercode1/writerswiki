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

//  Admin Routes

Route::get('/admin', 'AdminController@index')->name('admin');

//  home routes

Route::get('/', 'HomeController@index')->name('home.index');

Route::get('/home', 'HomeController@index')->name('home.index');

// api routes

Route::get('api/user-data', 'ApiController@userData');

// auth routes

Auth::routes();

// user routes

Route::resource('user', 'UserController');



