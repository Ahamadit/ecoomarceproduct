<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


Route::get('/', [ProductController::class, 'show'])->name('product.index');

Route::get('/product/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/product', [ProductController::class, 'store'])->name('product.store');

Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');

Route::put('/product/{id}', [ProductController::class, 'update'])->name('product.update');

Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
