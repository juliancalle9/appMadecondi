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

Route::get('clients', function () {
    return view('clients');
});

Route::get('clients', 'ClientController@index')->name('clients');
Route::get('clients', 'ClientController@create')->name('create');

Route::resource('clients','ClientController');
Auth::routes();

Route::resource('sales','SaleController');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('menu', function () {
    return view('menu');
});