<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::all()->sortBy('created_at');
        $currentUrl = '/Lista_productos';
        return view('store.lista_productos')->with([
            'currentUrl' => $currentUrl,
            'products' => $product
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Category::all();
        return view('actualizacion_stock.create', ['categorias' => $categorias]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Product::create($request->all());
        return redirect()->route('actualizacion_stock.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, $id)
    {
        $producto = Product::findOrFail($id);
        $cantidad = $request->input('cantidad');

        $producto->stock += $cantidad;
        $producto->save();

        // Pasar los productos actualizados como un mensaje de sesión
        $products = Product::all();
        session()->flash('success', 'Stock actualizado exitosamente');

        return redirect()->route('store.update')->with('products', $products);
    }


    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Product $product)
    {
        //
    }
}
