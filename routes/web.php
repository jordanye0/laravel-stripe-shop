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
Route::get('/', 'FrontController@index')->name('home');
Route::get('/product/{product}', 'FrontController@show')->name('show');
Route::post('/cart/add', 'ShoppingController@addToCart')->name('cart.add');
Route::resource('/products', 'ProductsController');

Auth::routes();
