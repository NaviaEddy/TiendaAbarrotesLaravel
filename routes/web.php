<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\VentaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [IndexController::class, 'index']);

Route::resource('/Lista_productos', ProductController::class);
Route::get('home/ventas', function(){
    return view('store.venta');
});
Route::get('home/stock', function(){
    return view('store.update');
});
Route::resource('productos', ProductController::class);
Route::resource('/stock',StockController::class);
Route::get('/ventas/efectivo', [VentaController::class, 'EfectivoIndex'], )->name('ventas.EfectivoIndex');
Route::post('/ventas/efectivo', [VentaController::class, 'EfectivoStore'])->name('ventas.EfectivoStore');
Route::get('/ventas/transferencia', [VentaController::class, 'TransferenciaIndex'], )->name('ventas.TransferenciaIndex');
Route::post('/ventas/transferencia', [VentaController::class, 'EfectivoStore'])->name('ventas.EfectivoStore');
Route::resource('/ventas', VentaController::class);
