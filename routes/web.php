<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\IndexController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [IndexController::class, 'index']);

Route::resource('/Lista_productos', ProductController::class);

Route::get('/ventas/efectivo', [VentaController::class, 'EfectivoIndex'], )->name('ventas.EfectivoIndex');
Route::post('/ventas/efectivo', [VentaController::class, 'EfectivoStore'])->name('ventas.EfectivoStore');
Route::get('/ventas/transferencia', [VentaController::class, 'TransferenciaIndex'], )->name('ventas.TransferenciaIndex');
Route::post('/ventas/transferencia', [VentaController::class, 'EfectivoStore'])->name('ventas.EfectivoStore');
Route::resource('/ventas', VentaController::class);
