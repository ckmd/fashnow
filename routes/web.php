<?php

use App\Http\Controllers\CartsController;

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
Route::get('/printNota','BuysController@printNota');
Route::get('/product_summary','BuysController@showKeranjang');
Route::get('/category','ProductsController@showPerCategories');
Route::get('/products/{id}','ProductsController@showDetail');
Route::post('/products/{id}','ProductsController@calculate');
Route::get('/confirmation','BuysController@confirmation');
//Route::get('/home', 'HomeController@index');
Route::get('/products','ProductsController@showProducts');
Route::post('/succeess','BuysController@prosesTransaksi');
Route::get('/profil','UsersController@index');
Route::delete('/product_summary/{id}', 'CartsController@destroy');
Route::patch('/users/edit/{user}','UsersController@update');
Route::get('/users/edit/{user}','UsersController@updatePage');
Route::get('/history','BuysController@history');
// Route::get('/products', function()
// {
//     return View::make('post.products');
// });
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
