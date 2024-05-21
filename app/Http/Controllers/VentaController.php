<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class VentaController extends Controller
{
    public function index()
    {
        $currentUrl = '/ventas';
        $alert_products = Product::all();
        $products = session()->get('products', []);
        //session()->flush();
        $totalPrice = 0.0;
        // Verificar si existe la sesión y si hay productos almacenados
        if (session()->has('products') && count($products) > 0) {
            // Calcular el precio total solo si hay productos y precios definidos
            $totalPrice = array_reduce($products, function ($carry, $product) {
                // Verificar si existe un precio definido para el producto
                if (isset($product['precio'])) {
                    // Si hay un precio definido, calcular el subtotal y agregarlo al total
                    return $carry + ($product['precio'] * $product['cantidad']);
                } else {
                    // Si no hay precio definido, devolver el total sin modificar
                    return $carry;
                }
            }, 0);
        }

        return view('store.venta')->with([
            'currentUrl' => $currentUrl,
            'alert_products' => $alert_products,
            'products' => $products,
            'totalPrice' => $totalPrice,
        ]);
    }

    public function store(Request $request)
    {
        $productName = $request->input('productName');
        $amount = $request->input('amount');

        // Obtener el precio del producto desde la base de datos
        $product = Product::where('name', $productName)->first();

        // Verificar si se encontró el producto
        if ($product) {
            $price = $product->price; // Obtener el precio del producto
            $price_total = $price * $amount; // Calcular el precio total
            // Almacenar el producto en el array de productos en la sesión
            $products = session()->get('products', []);
            $products[] = [
                'nombre' => $productName,
                'cantidad' => $amount,
                'precio' => $price,
                'total_precio' => $price_total
            ];
            session()->put('products', $products);

            return redirect()->route('ventas.index');
        } else {
            // Manejar el caso en el que el producto no se encuentra en la base de datos
            return back()->with('error', 'El producto no fue encontrado en la base de datos.');
        }
    }

    public function EfectivoIndex()
    {
        $currentUrl = '/ventas';
        // Obtener todos los productos de la sesión
        $products = session()->get('products', []);

        // Calcular el precio total de todos los productos
        $totalPrice = array_reduce($products, function ($carry, $product) {
            return $carry + ($product['precio'] * $product['cantidad']);
        }, 0);

        // Pasar los datos a la vista
        return view('store.pago_efectivo')->with([
            'currentUrl' => $currentUrl, // URL actual
            'products' => $products, // Lista de productos
            'totalPrice' => $totalPrice, // Precio total de todos los productos
        ]);
    }

    public function EfectivoStore()
    {

        $products = session()->get('products', []);

        // Iterar sobre cada producto
        foreach ($products as $product) {
            // Obtener el producto desde la base de datos
            $dbproduct = Product::where('name', $product['nombre'])->first();

            // Verificar si se encontró el producto en la base de datos
            if ($dbproduct) {
                // Calcular el nuevo stock restando la cantidad vendida
                $newStock = $dbproduct->stock - $product['cantidad'];

                // Verificar si el stock resultante es mayor o igual a cero
                if ($newStock >= 0) {
                    // Actualizar el stock en la base de datos
                    $dbproduct->stock = $newStock;
                    $dbproduct->save();
                } else {
                    // Manejar el caso en el que no hay suficiente stock
                    return back()->with('error', 'No hay suficiente stock para el producto ' . $product->name);
                }
            } else {
                // Manejar el caso en el que el producto no se encuentra en la base de datos
                return back()->with('error', 'El producto ' . $product['nombre'] . ' no fue encontrado en la base de datos.');
            }
        }

        // Limpiar la sesión de productos después de realizar la venta
        session()->forget('products');

        // Redirigir u ofrecer alguna respuesta de éxito
        return redirect()->route('ventas.index');
    }

    public function TransferenciaIndex()
    {
        $currentUrl = '/ventas';
        // Obtener todos los productos de la sesión
        $products = session()->get('products', []);

        // Calcular el precio total de todos los productos
        $totalPrice = array_reduce($products, function ($carry, $product) {
            return $carry + ($product['precio'] * $product['cantidad']);
        }, 0);

        // Pasar los datos a la vista
        return view('store.pago_transferencia')->with([
            'currentUrl' => $currentUrl, // URL actual
            'products' => $products, // Lista de productos
            'totalPrice' => $totalPrice, // Precio total de todos los productos
        ]);
    }

    public function destroySession(Request $request)
    {
        // Destruir la sesión y eliminar todos los datos almacenados en ella
        session()->flush();
        // Redirigir a una ruta específica, por ejemplo, la página de inicio
        return redirect()->route('ventas.index');
    }
}
