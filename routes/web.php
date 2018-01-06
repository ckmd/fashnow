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
// Route::get('/{id}','ProductsController@showDetail');
// Route::post('/{id}','ProductsController@calculate');
Route::get('/home', 'HomeController@index');
Route::post('/products','ProductsController@showPerCategories');
// <<<<<<< HEAD
Route::get('/category','ProductsController@showPerCategories');

// =======
// >>>>>>> f6775996a99face94c1cfc9992e62e0c4b8eac7d
Route::get('/products', function()
{
    return View::make('post.products');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
