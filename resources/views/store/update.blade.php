@extends('layouts.layout')

@section ('styles')
<link rel="stylesheet" href="{{ asset('css/styles_update.css') }}">
@endsection

@section('content')
<div class="container">
    <h1>Actualización de Stock</h1>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Stock</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $producto)
            <tr>
                <td>{{ $producto->id }}</td>
                <td>{{ $producto->name }}</td>
                <td>{{ $producto->stock }}</td>
                <td>
                    <form action="{{ route('stock.update', $producto->id) }}" method="POST" class="stock-form">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="producto_id" value="{{ $producto->id }}">
                        <input type="number" name="cantidad" value="0" min="0" id="cantidad-{{ $producto->id }}" class="form-control cantidad-input">
                        <button type="button" class="btn btn-primary" onclick="increment('{{ $producto->id }}')">+</button>
                        <button type="button" class="btn btn-primary" onclick="decrement('{{ $producto->id }}')">-</button>
                        <button type="submit" class="btn btn-success">Ingresar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('scripts')
<script>
    function increment(id) {
        var input = document.getElementById('cantidad-' + id);
        input.value = parseInt(input.value) + 1;
    }

    function decrement(id) {
        var input = document.getElementById('cantidad-' + id);
        var value = parseInt(input.value) - 1;
        input.value = value < 0 ? 0 : value;
    }
</script>
