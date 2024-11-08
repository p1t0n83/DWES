<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>
    <?php
    require_once '../vendor/autoload.php';
    use App\Clases\ConexionBD;
    use App\Clases\FuncionBD;
    $connection = ConexionBD::getConnection();
    $funciones = new FuncionBD();
    if ($connection instanceof PDO) {
        echo '';
    }
    ?>
<!--Ejercicio 5-->
    <h1>Ejercicio 5</h1>
    <?php
    $equipos = $funciones->getEquipos();
    ?>
    <p>Equipo:
        <select>
            <?php
            foreach ($equipos as $equipo) {
                echo '<option>' . $equipo['nombre'] . '</option>';
            }
            ?>
        </select>
    </p>
    </body>
    </html>