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
Route::get('/cart/increment/{item}/{qty}', 'ShoppingController@increment')->name('cart.increment');
Route::get('/cart/decrement/{item}/{qty}', 'ShoppingController@decrement')->name('cart.decrement');
Route::get('/cart/delete/{item}', 'ShoppingController@deleteFromCart')->name('cart.delete');
Route::get('/cart', 'ShoppingController@cart')->name('cart');
Route::resource('/products', 'ProductsController');

Auth::routes();
