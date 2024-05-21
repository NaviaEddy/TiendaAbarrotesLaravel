@extends('layouts.layout')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/styles_transferencia.css') }}">
@endsection

@section('content')
<div class="transferencia-container">
    <h2 style="text-align: center;">Factura</h2>
    <div class="container-info">
        <div class="qr-code">
            <img src="{{ asset('content/imgs/photo_2024-02-28_03-38-42.jpg') }}" alt="Código QR" width="270px" height="300px"><br>
        </div>
        <div class="form">
            <form id="facturaForm" action="{{ route('ventas.EfectivoStore') }}" method="post">
                @csrf
                <div class="codigo-transferencia">
                    <label for="codigo">Código de transferencia:</label>
                    <input type="text" id="codigo" name="codigo" required>
                </div>
                <div class="productos-seleccionados">
                    <h3>Productos Seleccionados:</h3>
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
                <div class="botones">
                    <button type="submit">Pagar</button>
                    <button onclick="window.history.back()">Volver</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection