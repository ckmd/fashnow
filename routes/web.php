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


Route::get('/', 'ProductsController@index');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('/product_summary','BuysController@showKeranjang');

Route::get('/home', 'HomeController@index');
Route::get('/home/{id}', 'HomeController@show');
// Route::get('/products','ProductsController@index');
