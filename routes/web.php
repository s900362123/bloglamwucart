<?php

use Illuminate\Support\Facades\Route;

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
    return view('index');
});

Auth::routes();

Route::get('/home', function () {
    return view('index');
});

Route::get('Category/{id?}', 'CategoryController@index')->name('Category.index');

Route::get('Cart', 'CartController@index')->name('cart.index');

Route::get('Cart/{id}', 'CartController@tmp')->name('cart.tmp');

Route::delete('Cart_del/{id}', 'CartController@destroy')->name('cart.destroy');
