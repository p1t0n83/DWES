<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Libros</title>
</head>
<body>
    <h1>Lista de Libros</h1>
    <?php
    require_once '../vendor/autoload.php';
    use App\FuncionesBD;

    $funciones = new FuncionesBD();
    $libros = $funciones->getLibros(); // Obtener los libros desde la base de datos

    if (!empty($libros)) {
        echo '<table border="1" cellpadding="5" cellspacing="0">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>Título</th>';
        echo '<th>Año de Edición</th>';
        echo '<th>Precio</th>';
        echo '<th>Fecha de Adquisición</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        foreach ($libros as $libro) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($libro->titulo) . '</td>';
            echo '<td>' . htmlspecialchars($libro->anyo_edicion) . '</td>';
            echo '<td>' . htmlspecialchars($libro->precio) . ' €</td>';
            echo '<td>' . htmlspecialchars($libro->fecha_adquisicion) . '</td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
    } else {
        echo '<p>No hay libros registrados.</p>';
    }
    ?>
    <a href="libros.php">Volver</a>
</body>
</html>