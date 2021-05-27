<?php
use App\Http\Controllers\ClientController;
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
Route::get('sales', function () {
    return view('sales');
});


Route::get('clients', 'ClientController@index')->name('clients');
Route::get('clients', 'ClientController@list');
Route::get('clients', 'ClientController@create')->name('create');
Route::get('clients', 'ClientController@edit')->name('edit');
/*Route::get('clients/{documento}/{estado}', 'ClientController@updateState');*/
/*Route::get('cambiarEstado', 'ClientController@cambiarEstado');*/
Route::get('/estado/update', 'ClientController@updateStatus')->name('clients.update.status');




Route::resource('clients','ClientController');
Auth::routes();

Route::resource('sales','SaleController');



Route::resource('products','ProductController');
Auth::routes();

Route::get('categories', 'CategoryController@index')->name('categories');
Route::get('categories', 'CategoryController@create')->name('create');
Route::get('categories', 'CategoryController@edit')->name('edit');

Route::resource('categories','CategoryController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('menu', function () {
    return view('menu');
});
Route::resource('cities','CityController');
Route::get('cities/{idciudad}', 'CityController@edit');

 
Route::resource('suppliers','SupplierController');

Route::get('PaginaWeb', function () {
    return view('index');
});
Route::resource('purchases','purchaseController');
 
