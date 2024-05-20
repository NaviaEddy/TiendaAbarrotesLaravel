<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/store', [ProductController::class, 'index'])->name('actualizacion_stock.index');
Route::get('/store/create', [ProductController::class, 'create'])->name('actualizacion_stock.create');
Route::resource('productos', ProductController::class);
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [IndexController::class, 'index']);

Route::resource('home/Lista_productos', ProductController::class);

Route::get('home/ventas', function(){
    return view('store.venta');
});
