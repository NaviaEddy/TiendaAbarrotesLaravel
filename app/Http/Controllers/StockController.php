<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
class StockController extends Controller
{
    public function index(){
        $products = Product::all()->sortBy('created_at');
        $currentUrl = '/stock';
        return view('store.update')->with(['currentUrl' => $currentUrl,
        'products' => $products]);
    }
    public function update(Request $request, $id)
    {
        $producto = Product::findOrFail($id);
        $cantidad = $request->input('cantidad');

        $producto->stock += $cantidad;
        $producto->save();

        return redirect()->route('stock.index');
    }
}
