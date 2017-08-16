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

use App\Product;

Auth::routes();

Route::get('/', 'ProductsController@index');

Route::post('/search', 'ProductsController@search');
Route::get('/show/{id}', 'ProductsController@show');

Route::get('/cart', 'ShoppingCartController@index')->middleware('auth', 'moderator', 'admin');
Route::post('/cart/{product_id}', 'ShoppingCartController@create')->middleware('auth', 'moderator', 'admin');
Route::delete('/cart/{product_id}', 'ShoppingCartController@destroy')->middleware('auth', 'moderator', 'admin');

Route::get('/admin/products', 'ProductsController@listAllProducts')->middleware('auth', 'visitor');

Route::post('/admin/products/store', 'ProductsController@store')->middleware('auth', 'visitor', 'moderator');
Route::get('/admin/products/{product}/edit', 'ProductsController@edit')->middleware('auth', 'visitor');
Route::put('/admin/products/{product}', 'ProductsController@update')->middleware('auth', 'visitor');
Route::delete('/admin/products/{product}/delete', 'ProductsController@destroy')->middleware('auth', 'visitor', 'moderator');


Route::resource('admin/categories', 'CategoriesController');
Route::resource('admin/users', 'UsersController');

Route::get('/products', 'ApiController@index');
