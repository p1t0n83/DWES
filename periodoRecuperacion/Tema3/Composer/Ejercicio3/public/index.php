<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="get">
        <h1>generador de contraseñas</h1>
        <label for="longitud">Longitud: <input type="number" name="longitud" value="12"></label><br>
        <label for="numeros">Numeros: <input type="checkbox" name="numeros"></label><br>
        <label for="minus">Minusculas: <input type="checkbox" name="minus"></label><br>
        <label for="mayus">Mayusculas: <input type="checkbox" name="mayus"></label><br>
        <label for="simbolos">Simbolos: <input type="checkbox" name="simbolos"></label><br>
        <button type="submit">Generar Contraseña</button>
    </form>
    <?php
    require_once '../vendor/autoload.php';


    use MiAplicacion\Clases\GeneradorPassword;
    use MiAplicacion\Clases\AdaptadorGeneradorPassword;

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if(isset($_GET['numeros']) || isset($_GET['minus']) || isset($_GET['mayus']) || isset($_GET['simbolos'])){
        $numeros=isset($_GET['numeros']);
        $minus=isset($_GET['minus']);
        $mayus=isset($_GET['mayus']);
        $simbolos=isset($_GET['simbolos']);
        $longitud=$_GET['longitud'];
        $generador = new GeneradorPassword(new AdaptadorGeneradorPassword());
        $generador->generar($numeros,$mayus,$minus,$simbolos,$longitud);
    }else{
        echo "No has seleccionado nada manin";
    }
}
    ?>
</body>

</html>