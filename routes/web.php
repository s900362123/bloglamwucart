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


Route::group(['middleware' => 'auth'],function(){


  Route::get('Cart', 'CartController@show')->name('cart.show');

  Route::get('Cart/{id}', 'CartController@tmp')->name('cart.tmp');

  Route::delete('Cart_del/{id}', 'CartController@destroy')->name('cart.destroy');

  Route::get('Cart_update/{id}', 'CartController@update')->name('cart.update');

  Route::get('Cart_comfirm', 'CartController@comfirm')->name('cart.comfirm');

  Route::post('Order', 'OrderController@store')->name('order.store');

  Route::get('order', 'OrderController@index')->name('order.index');

  Route::get('order_detail/{id}', 'OrderController@show')->name('order.show');



});
