<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
</head>
<body>
    <h1>Editar Producto</h1>

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('productos.update', $producto->slug) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div>
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" id="titulo" value="{{ $producto->titulo }}" required>
        </div>

        <div>
            <label for="precio">Precio:</label>
            <input type="number" name="precio" id="precio" step="0.01" value="{{ $producto->precio }}" required>
        </div>

        <div>
            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" id="descripcion" required>{{ $producto->descripcion }}</textarea>
        </div>

        <div>
            <label for="familia">Familia:</label>
            <select name="familia" id="familia" required>
                @foreach($familias as $familia)
                    <option value="{{ $familia->codigo }}"
                        {{ $producto->familia_id == $familia->id ? 'selected' : '' }}>
                        {{ $familia->descripcion }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="imagen">Imagen actual:</label>
            @if($producto->imagen)
                <img src="{{ $producto->imagen->url }}" alt="{{ $producto->titulo }}" width="200">
            @else
                <p>No hay imagen</p>
            @endif
            <input type="file" name="imagen" id="imagen">
            <small>Dejar vacío para mantener la imagen actual</small>
        </div>

        <button type="submit">Actualizar Producto</button>
        <a href="{{ route('productos.index') }}">Cancelar</a>
    </form>

    @if($errors->any())
        <div>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</body>
</html>
