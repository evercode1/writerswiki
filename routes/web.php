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

Route::get('/', 'HomeController@index')->name('home.index');
Auth::routes();

// Begin Nudge Routes

Route::any('api/nudge-data', 'ApiController@nudgeData');

Route::post('nudge-delete/{id}', 'NudgeController@destroy');

Route::get('/nudge/create', 'NudgeController@create')->name('nudge.create');

Route::get('nudge/{id}', 'NudgeController@show')->name('nudge.show');

Route::resource('nudge', 'NudgeController', ['except' => ['show', 'create','destroy']]);

// End Nudge Routes

