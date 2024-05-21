@extends('layouts.layout')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/styles_efectivo.css') }}">
@endsection

@section('content')
<div class="factura-container">
    <form id="facturaForm" action="{{ route('ventas.EfectivoStore') }}" method="post">
        @csrf
        <h2>Factura</h2>
        <div class="productos">
            <ul>
                @foreach ($products as $product)
                <li>
                    <div>
                    {{ $product['nombre'] }} - Cantidad: {{ $product['cantidad'] }} - @if(isset($product['total_precio'])) Precio: {{ $product['total_precio'] }} @endif
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="total">
            <p>Total: {{ $totalPrice }}</p>
        </div>
        <button type="submit" class="pay-button">Pagar</button>
    </form>
    <button onclick="window.history.back()" class="back-button">Volver</button>
</div>
@endsection