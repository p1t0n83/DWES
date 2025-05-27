<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Alta producto</h1>
    <form action="{{ route('productos.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="titulo">Titulo:<br>
            <input type="text" name="titulo" id="titulo"></label><br>
        <label for="precio">Precio:<br>
            <input type="number" name="precio" id="precio" step="0"></label><br>
        <label for="descripcion">Descripcion:<br>
            <textarea name="descripcion" id="descripcion"></textarea>
        </label><br>
        <label for="familia">Selecciona una familia:<br>
            <select name="familia">
                @foreach ($familias as $familia)
                    <option value="{{$familia->codigo}}">{{$familia->descripcion}}</option>
                @endforeach
            </select>
        </label><br>
        <label for="imagen">Selecciona una imagen:<br>
         <input name="imagen" id="imagen" type="file" >
        </label><br>
        <button type="submit">Añadir Producto</button>
    </form>
</body>

</html>
