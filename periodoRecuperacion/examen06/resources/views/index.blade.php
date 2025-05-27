<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if (isset($_GET['success'])){
      <h2>Se guardo el producto con exito</h2>
    }
    @endif
    <h1>Pagina principal</h1>
    <a href="{{route('productos.create')}}">Crear Producto</a>

    @foreach ($productos as $producto)
        <h1>{{$producto->titulo}}</h1>
        @if($producto->imagen)
            <img src="{{$producto->imagen->url}}" alt="{{$producto->titulo}}">
        @endif
        @if($producto->familia)
            <p>Familia: {{$producto->familia->descripcion}}</p>
        @endif
        <p>Precio: {{$producto->precio}}</p>
        <p>Descripcion: {{$producto->descripcion}}</p>
        <a href="{{route('productos.edit', $producto->slug)}}">Editar</a>
        <form action="{{route('productos.destroy', $producto->slug)}}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit">Borrar</button>
        </form>
    @endforeach
</body>
</html>
