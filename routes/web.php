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

Route::get('/', 'HomeController@index');
Route::post('/upload', 'HomeController@upload');

Route::get('/build/{id}/{fullname}', 'BuildController@index');

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes('/login');

// Route::get('/home', 'HomeController@index')->name('home');
Route::fallback(function(){ abort(404); });