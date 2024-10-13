<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sumar Números</title>
</head>

<body>
    <h1>Formulario para Sumar Números</h1>
    <hr />
    <form method="post" action="">
        <?php
        // Generar 10 cajas de entrada dinámicamente
        for ($i = 1; $i <= 10; $i++) {
            echo "<label for='numero$i'>Número $i:</label>";
            echo "<input type='number' name='numeros[]' id='numero$i' required min='1' max='10' />";
            echo "<br />";
        }
        ?>
        <input type="submit" value="Sumar">
    </form>

    <?php
    // Comprobar si se han enviado números y calcular la suma
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['numeros'])) {
        $numeros = $_POST['numeros'];
        $suma = array_sum($numeros); // Calcular la suma

        echo "<h2>Resultado:</h2>";
        echo "La suma de los números es: " . $suma;
    }
    ?>
</body>
</html>
