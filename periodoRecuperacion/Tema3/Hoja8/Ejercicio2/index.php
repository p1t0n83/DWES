<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post" action="procesa.php">
        <label for="nombre">Nombre:<input name="nombre" id="nombre"></label>
        <label for="modulo"><select name="modulo" id="modulo">Elije:
            <option value="DWES">Desarrollo Web En Entorno Servidor</option>
            <option value="DWEC">DesarrolloWebenEntornoCliente</option>
        </select></label>
        <button>Enviar datos</button>
    </form>
    <?php
    if($_SERVER['REQUEST_METHOD']=='GET'){
        $nombre=$_GET['nombre'];
        $modulo=$_GET['modulo'];
        echo "El alumno".$nombre." ha elegido el modulo".$modulo;
    }
    ?>
</body>

</html>