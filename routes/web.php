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

Route::get('/', 'HomeController@index')->name('home');
Auth::routes();


Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
//Route::get('/shop', 'ProductController@index')->name('shop');
Route::resource('shop', 'ProductController', ['only' => ['index', 'show']])->middleware('auth');
Route::get('category/{id}', 'ProductController@category')->middleware('auth');
Route::any('/cart', 'CartController@getData')->middleware('auth');
Route::get('/cart/show', 'CartController@index')->middleware('auth');


Route::any('update/{id}', 'CartController@update')->name('update')->middleware('auth');
Route::post('delete/{id}', 'CartController@delete')->name('delete')->middleware('auth');
    
Route::group(['prefix' => 'checkout', 'as' => 'checkout.'], function() {
    Route::get('show', 'OrderController@show')->name('show')->middleware('auth');
    Route::post('submit', 'OrderController@submit')->name('submit')->middleware('auth');
    Route::any('thankyou', 'OrderController@index')->name('thanks')->middleware('auth');
});


// trying to do admin part
Route::get('/admin', 'ProductController@admin')->middleware('auth');
Route::get('/admin/category', 'CategoryController@index')->middleware('auth');
Route::any('/admin/category/add', 'CategoryController@add')->middleware('auth');
Route::any('/admin/category/show', 'CategoryController@show')->middleware('auth');
Route::any('/admin/category/update/{id}', 'CategoryController@update')->name('update')->middleware('auth');
Route::post('/admin/category/delete/{id}', 'CategoryController@delete')->name('delete')->middleware('auth');
Route::get('/admin/product', 'ProductController@product_form')->middleware('auth');
Route::any('/admin/product/add', 'ProductController@add')->middleware('auth');

