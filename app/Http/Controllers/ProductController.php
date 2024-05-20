<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Product::all();

        return view('actualizacion_stock.index', ['productos' => $productos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Category::all();
        return view('actualizacion_stock.create', ['categorias'=>$categorias]);
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
    public function show(Product $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $producto)
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

        // Aumentar la cantidad de stock actual
        $producto->stock += $cantidad;
        $producto->save();

        return redirect('/actualizacion_stock')->with('success', 'Stock actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $producto)
    {
        //
    }
}
