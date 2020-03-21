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

//Public Data
Route::get('/', 'HomeController@index');
Route::get('/bd', 'HomeController@bd');

Route::get('data-import/{date}', 'AutomationController@importsData');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


//Admin Data
Route::resource('bdcovids', 'CovidDataController');
Route::resource('bddata', 'BangladeshController');
