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

Route::resource('/', 'indexController');
Route::get('/delete/{id}','indexController@destroy');
Route::get('/edit/{id}','indexController@edit');
Route::post('/edit/{id}','indexController@update');
