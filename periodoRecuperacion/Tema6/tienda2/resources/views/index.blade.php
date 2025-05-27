<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Pagina principal</h1>
     <a href="{{route('productos.create')}}">Crear producto</a>                        
  
    @foreach ($productos as $producto)
       <div>{{  $producto->titulo}}</div>
       <a href="{{route('productos.show',$producto->slug)}}">Ver producto</a>                        
    @endforeach
</body>
</html>