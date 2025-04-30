<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta Producto</title>
    <style>
        .mensaje {
            margin: 10px 0;
            padding: 10px;
            border-radius: 5px;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
    </style>
</head>
<body>
    <h1>Alta producto</h1>

    <!-- Mostrar mensajes de error o éxito -->
    <?php
    if (isset($_GET['error'])) {
        $error = intval($_GET['error']);
        switch ($error) {
            case 1:
                echo "<div class='mensaje error'>Por favor, rellena todos los datos.</div>";
                break;
            case 2:
                echo "<div class='mensaje error'>No se puede procesar el archivo.</div>";
                break;
            case 3:
                echo "<div class='mensaje error'>El archivo no tiene una extensión válida.</div>";
                break;
            case 4:
                echo "<div class='mensaje error'>Por favor, introduce un precio válido.</div>";
                break;
            case 5:
                echo "<div class='mensaje error'>No se ha podido guardar el producto en la base de datos.</div>";
                break;
        }
    }

    if (isset($_GET['success']) && intval($_GET['success']) === 1) {
        echo "<div class='mensaje success'>El producto ha sido dado de alta correctamente.</div>";
    }
    ?>

    <form method="post" action="procesa.php" enctype="multipart/form-data"> 
        <label for="nombre">Nombre:<input type="text" name="nombre" id="nombre"></label><br>
        <label for="descripcion">Descripcion:<textarea name="descripcion" id="descripcion"></textarea></label><br>
        <label for="precio">Precio:<input type="number" name="precio" id="precio"></label><br>
        <label for="familia">Seleccione una familia:
            <select id="familia" name="familia">
                <?php
                require_once '../vendor/autoload.php';
                use Ejercicio0405\clases\PDOProducto;
                $funciones = new PDOProducto();
                $familias = $funciones->getFamilias();
                foreach ($familias as $familia) {
                    echo '<option value="' . $familia->idfamilias . '">' . $familia->nombre . '</option>';
                }
                ?>
            </select>
        </label><br>
        <label for="imagen">Imagen:<input type="file" name="imagen" id="imagen"></label><br>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>