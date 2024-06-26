@extends('layouts.layout')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/styles_lista_productos.css') }}">
@endsection

@section('content')
<div class="container">
        <div class="header">
            <h1>LISTA DE PRODUCTOS 2024</h1>
            <!-- <a href="{{ route('Lista_productos.create') }}" class="create-button">Crear</a> -->
        </div>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Codigo</th>
                        <th>Stock</th>
                        <th>Precio</th>
                        <th>Categoria</th>
                        <!-- <th>Acciones</th> -->
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $producto)
                    <tr>
                        <td>{{ $producto->name }}</td>
                        <td>{{ $producto->code }}</td>
                        <td>{{ $producto->stock }}</td>
                        <td>{{ $producto->price }}</td>
                        <td>
                        @foreach ($categories as $category)
                            @if($producto->category_id == $category->id)
                                {{ $category->name }}
                            @endif
                        @endforeach
                        </td>
                        <!-- <td>
                            <div class="action-buttons">
                                <a href="{{ route('Lista_productos.edit', $producto->id) }}" class="edit-button">Editar</a> 
                                <button type="button" onclick="ConfirmDelete('{{ $producto->id }}')" class="delete-button">Eliminar</button>
                            </div>
                        </td> -->
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection


@section('scripts')
<script>
        function ConfirmDelete(id) {
            if(confirm('¿Estás seguro de que deseas eliminar este producto?')) {
                window.location.href = '/products/delete/' + id;
            }
        }
</script>
@endsection