<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return redirect()->route('products.index');
});

// 一覧表示
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

// 商品登録（新規作成フォーム表示）
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');

// 商品登録処理（フォーム送信先）
Route::post('/products', [ProductController::class, 'store'])->name('products.store');

// 商品詳細表示
Route::get('/products/{slug}', [ProductController::class, 'show'])->name('products.show');

// 編集フォーム表示
Route::get('/products/{slug}/edit', [ProductController::class, 'edit'])->name('products.edit');

// 更新処理
Route::put('/products/{slug}', [ProductController::class, 'update'])->name('products.update');

// 削除
Route::delete('/products/{slug}', [ProductController::class, 'destroy'])->name('products.destroy');
