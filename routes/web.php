<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\StockController;

Route::get('/home', [IndexController::class, 'index']);

Route::resource('home/Lista_productos', ProductController::class);

Route::get('home/ventas', function(){
    return view('store.venta');
});
Route::get('home/stock', function(){
    return view('store.update');
});
Route::resource('productos', ProductController::class);
Route::resource('/stock',StockController::class);