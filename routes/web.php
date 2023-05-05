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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// ログイン画面
Route::get('/home', 'HomeController@index')->name('home');

// 商品情報一覧画面
Route::get('/products/index/','ProductsController@index')->name('products.index');

// 商品情報削除
Route::post('/products/destroy/','ProductsController@destroy')->name('products.destroy');

// 商品新規登録画面
Route::get('products/create/','ProductsController@create')->name('products.create');
Route::post('/products/store/','ProductsController@store')->name('products.store');

// 商品情報詳細画面
Route::get('/products/show/','ProductsController@show')->name('products.show');
Route::get('/products/show/{$id}','ProductsController@show')->name('products.show');

// 商品情報編集画面
Route::get('/products/edit/','ProductsController@edit')->name('products.edit');
Route::put('/products/edit/','ProouctsController@update')->name('products.update');

