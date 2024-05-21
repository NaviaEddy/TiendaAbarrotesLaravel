<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::all()->sortBy('created_at');
        $category = Category::all();
        $currentUrl = '/Lista_productos';
        return view('store.lista_productos')->with([
            'currentUrl' => $currentUrl,
            'products' => $product,
            'categories' => $category,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categoria = Category::all();
        return view('store.create')->with([
            'categories' => $categoria,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'code' => 'required',
            'image' => 'required',
            'expiration_date' => 'required',
        ]);

        Product::create($request->all());
        return redirect()->route('Lista_productos.index');
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
    public function edit(string $id)
    {
        $product = Product::findOrfail($id);
        $category = Category::all();
        return view('store.edit')->with([
            'product' => $product,
            'categories' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'code' => 'required',
            'image' => 'required',
            'expiration_date' => 'required',
        ]);

        $product = Product::findOrfail($id);
        $product->update($request->all());
        return redirect()->route('Lista_productos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrfail($id);
        $product->delete();
        return redirect()->route('Lista_productos.index');
    }
}
