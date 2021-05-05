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
Route::get('products', function () {
    return view('products');
});
Route::get('categories', function () {
    return view('categories');
});
Route::get('lots', function () {
    return view('lots');
});

Route::get('clients', 'ClientController@index')->name('clients');
Route::get('clients', 'ClientController@list');
Route::get('clients', 'ClientController@create')->name('create');
Route::get('clients', 'ClientController@edit')->name('edit');
/*Route::get('clients/{documento}/{estado}', 'ClientController@updateState');*/
Route::get('cambioEstado', 'ClientController@cambiarEstado')->name('cambioEstado'); 

Route::resource('clients','ClientController');
Auth::routes();

Route::resource('sales','SaleController');
Route::get('products', 'ProductController@index')->name('products');
Route::get('products', 'ProductController@create')->name('create');
Route::get('products', 'ProductController@create')->name('edit');

Route::resource('products','ProductController');
Auth::routes();

Route::get('categories', 'CategoryController@index')->name('categories');
Route::get('categories', 'CategoryController@create')->name('create');
Route::get('categories', 'CategoryController@create')->name('edi');

Route::resource('categories','CategoryController');
Auth::routes();

Route::get('lots', 'LotController@index')->name('lots');
Route::get('lots', 'LotController@create')->name('create');
Route::get('lots', 'LotController@create')->name('edi');

Route::resource('lots','LotController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('menu', function () {
    return view('menu');
});

Route::resource('cities','CityController');
 
Route::resource('suppliers','SupplierController');

 