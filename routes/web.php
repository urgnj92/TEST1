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
Route::get('/index',[App\Http\Controllers\ProductsController::class, 'index'])->name('index');

// 商品情報削除
Route::post('/delete/{id}',[App\Http\Controllers\ProductsController::class, 'delete'])->name('delete');

// 商品新規登録画面
// 登録画面/登録処理
Route::get('/create',[App\Http\Controllers\ProductsController::class, 'create'])->name('create');
Route::post('/create',[App\Http\Controllers\ProductsController::class, 'store'])->name('store');

// 商品情報詳細画面
Route::get('/show/{id}',[App\Http\Controllers\ProductsController::class, 'show'])->name('show');

// 商品情報編集画面
Route::get('/edit/{id}',[App\Http\Controllers\ProductsController::class, 'edit'])->name('edit');
Route::post('/edit/{id}',[App\Http\Controllers\ProductsController::class, 'update'])->name('update');
