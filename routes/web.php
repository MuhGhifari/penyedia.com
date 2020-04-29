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
    return redirect()->route('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('/shop')->name('shop.')->group(function(){
  Route::get('/index', 'ShopController@index')->name('index');
  Route::get('/{id}/categories/{slug}', 'ShopController@categories')->name('categories');
  Route::get('/{id}/{parent_id}/categories/{slug}', 'ShopController@subcategories')->name('subcategories');
  Route::get('/product/{id}/{slug}', 'ProductController@index')->name('product.detail');
});

Route::get('admin/home', 'HomeController@adminHome')->name('admin.home')->middleware('admin');
