<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Libros</title>
</head>

<body>
    <h1>Registro de Libros</h1>
    <form method="post" action="libros_guardar.php">
        <label for="titulo">Título del libro:</label><br>
        <input type="text" id="titulo" name="titulo" required><br><br>

        <label for="anio">Año de edición:</label><br>
        <input type="number" id="anio" name="anio" min="1000" max="<?php echo date('Y'); ?>" required><br><br>

        <label for="precio">Precio:</label><br>
        <input type="number" id="precio" name="precio" step="0.01" min="0" required><br><br>

        <label for="fecha">Fecha de adquisición:</label><br>
        <input type="date" id="fecha" name="fecha" required><br><br>

        <button type="submit">Registrar Libro</button>
</form>
<a href='libros_datos.php'>Ver libros</a> 
</body>

</html>