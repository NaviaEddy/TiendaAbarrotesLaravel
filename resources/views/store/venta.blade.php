@extends('layouts.layout')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/styles_venta.css') }}">
@endsection

@section('content')
<div class="read">
    <div class="venta">
        <h1 style="text-align: center; margin-top: 20px;">Ventas</h1>
        <form id="sellForm" action="" method="post">
            @csrf
            <label for="productName">Producto:</label>
            <input type="text" id="productName" name="productName" placeholder="Ingrese nombre o codigo de producto" required /><br /><br />
            <label for="amount">Cantidad:</label>
            <input type="number" id="amount" name="amount" placeholder="Ingrese cantidad" required /><br /><br />
            <button type="submit" class="button-vender">Agregar</button>
        </form>
    </div>

    <div class="pagos">
        <div class="pacientes">
            @foreach ($alert_products as $product)
            @if ($product->stock <= 10) 
            <div class="alert-container">
                <div class="alert">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">×</span>
                    <p>
                        ¡Alerta! El producto {{ $product->name }} tiene niveles de
                        existencia bajos ({{ $product->stock }})
                    </p>
                </div>
            </div>
            @endif
            @endforeach
        </div>
        <div id="lista" class="lista">
            <h2>Productos Agregados:</h2>
            <ul>
                @foreach ($products as $product)
                <li>
                    <div class="list_button">
                        <div>
                            {{ $product['nombre'] }} - Cantidad: {{ $product['cantidad'] }} - @if(isset($product['total_precio'])) Precio: {{ $product['total_precio'] }} @endif
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
            <p>Total: {{ $totalPrice }}</p>
        </div>
        <h1 style="text-align: center;">Selección de Forma de Pago</h1>
        <div class="pagos_botones">
            <button onclick="window.location.href=`{{ route('ventas.EfectivoIndex') }}`">
                Pagar en Efectivo
            </button>
            <button onclick="window.location.href=`{{ route('ventas.TransferenciaIndex') }}`">
                Pagar por Transferencia
            </button>
        </div>

    </div>
</div>
@endsection


@section('scripts')
<script>
    document.getElementById("sellForm").addEventListener("submit", function(event) {
        setTimeout(function() {
            window.location.reload();
        }, 1000);
    });
</script>
@endsection