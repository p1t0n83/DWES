<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Gestion de plazas</h1>
    <form method="POST">
        <?php
        require "../vendor/autoload.php";
        use App\FuncionesBD;
        $funciones=new FuncionesBD();
        $asientos=$funciones->getAsientos();
        foreach($asientos as $asiento){
            echo '<label for="plaza_' . $asiento->numero . '">Plaza ' . $asiento->numero . ':</label>';
            echo '<input type="number" id="plaza_' . $asiento->numero . '" name="precios[' . $asiento->numero . ']" value="' . $asiento->precio . '" step="0.01" required><br><br>';
        }
        ?>
         <button type="submit">Guardar cambios</button>
    </form>

    <?php
       if($_SERVER['REQUEST_METHOD']==='POST'){
        $asientos=$_POST['precios'];
        $funciones->actualizarPrecios($asientos);
       }
    ?>
</body>
</html>