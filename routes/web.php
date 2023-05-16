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
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// 商品情報一覧画面
Route::get('/index',[App\Http\Controllers\ProductsController::class, 'index'])->name('products.index');

// 商品情報削除
Route::post('/destroy/{id}',[App\Http\Controllers\ProductsController::class, 'destroy'])->name('products.destroy');

// 商品新規登録画面
// 登録画面/登録処理
Route::get('/create',[App\Http\Controllers\ProductsController::class, 'create'])->name('products.create');
Route::post('/create',[App\Http\Controllers\ProductsController::class, 'store', 'registProduct'])->name('products.store');

// 商品情報詳細画面
Route::get('/show/{id}',[App\Http\Controllers\ProductsController::class, 'show'])->name('products.show');

// 商品情報編集画面
Route::get('/edit/{id}',[App\Http\Controllers\ProductsController::class, 'edit'])->name('products.edit');
Route::post('/edit/{id}',[App\Http\Controllers\ProductsController::class, 'update'])->name('products.update');
