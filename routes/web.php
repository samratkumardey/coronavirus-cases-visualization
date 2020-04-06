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
//Auth::routes();
Auth::routes(['register' => false, 'verify' => true]);

//Public Data
Route::get('/', 'HomeController@bd');
Route::get('/world', 'HomeController@index');
Route::get('/info', 'HomeController@info');
Route::get('/map', 'HomeController@map');
Route::get('/bdmap', 'HomeController@bdmap');
Route::get('/analysis', 'HomeController@analysis');

Route::get('data-import/{date}', 'AutomationController@importsData');
Route::get('/home', 'HomeController@bd')->name('home');


//Admin Data
Route::get('admin', 'AdminController@index');
Route::resource('bdcovids', 'CovidDataController');
Route::resource('bddata', 'BangladeshController');
