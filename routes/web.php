<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/store', [ProductController::class, 'index'])->name('actualizacion_stock.index');
Route::get('/store/create', [ProductController::class, 'create'])->name('actualizacion_stock.create');
Route::resource('productos', ProductController::class);
