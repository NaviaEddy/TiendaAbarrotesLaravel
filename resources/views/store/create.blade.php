
<div class="container">
    <h1>Crear Producto</h1>
    <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="category_id">Categoría:</label>
            <select class="form-control" id="category_id" name="category_id" required>
                @foreach($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="description">Descripción:</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="price">Precio:</label>
            <input type="number" class="form-control" id="price" name="price" min="0" step="0.1" required>
        </div>
        <div class="form-group">
            <label for="stock">Stock:</label>
            <input type="number" class="form-control" id="stock" name="stock" min="0" required>
        </div>
        <div class="form-group">
            <label for="code">Código:</label>
            <input type="text" class="form-control" id="code" name="code" required>
        </div>
        <div class="form-group">
            <label for="image">Imagen:</label>
            <input type="file" class="form-control-file" id="image" name="image" accept="image/*" required>
        </div>
        <div class="form-group">
            <label for="expiration_date">Fecha de Vencimiento:</label>
            <input type="date" class="form-control" id="expiration_date" name="expiration_date" required>
        </div>
        <button type="submit" class="btn btn-primary">Crear Producto</button>
    </form>
</div>
