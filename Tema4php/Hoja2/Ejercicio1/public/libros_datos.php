<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LibrosDatos</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>
    <!--Ejercicio 4-->
    
    <?php
    require_once '../vendor/autoload.php';
    use App\Clases\ConexionBD;
    use App\Clases\FuncionBD;
    $connection = ConexionBD::getConnection();
    $funciones = new FuncionBD();
    $libros = $funciones->getLibros();
    echo ('<table>');
    echo('<tr><th>NUMERO DE EJEMPLAR</th><th>TITULO</th><th>AÑO DE EDICION</th><th>PRECIO</th><th>FECHA DE ADQUISICION</th></tr>');
    foreach ($libros as $libro) {
        echo ('<tr>');
        echo('<td>'.$libro['numero_ejemplar'].'</td><td>'.$libro['titulo'].'</td></td><td>'.$libro['anyo_edicion'].'</td></td><td>'.$libro['precio'].'</td></td><td>'.$libro['fecha_adquisicion'].'</td>');
        echo ('</tr>');
    }
    echo ('</table>');
    ?>
</body>

</html>