<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
   <h1>{{$producto->titulo}}</h1>
   <img src="{{$imagen->url}}">
   <p>Familia: {{$familia->descripcion}}</p>
   <p>Precio: {{$producto->precio}}</p>
   <p>Descripcion: {{$producto->descipcion}}</p>
   <a href="{{route('produtos.editar',$producto->slug)}}">Editar</a>
   <form action="{{route('productos.destroy')}}" method="post">
    @csrf
    @method('DELETE')
    <button type="submit">Borrar</button>
   </form>
</body>
</html>
