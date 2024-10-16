<?php
// Array asociativo de marcas de coches y sus modelos
$coches = [
    "Toyota" => ["Corolla", "Yaris", "RAV4"],
    "Ford" => ["Fiesta", "Focus", "Mustang"],
    "BMW" => ["Serie 3", "Serie 5", "X5"]
];

// Inicializar la marca seleccionada
$marcaSeleccionada = isset($_POST['marca']) ? $_POST['marca'] : '';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleccionar Marca de Coche</title>
</head>
<body>
    <h1>Selecciona una marca de coche</h1>

    <form method="POST">
        <!-- Combobox con las marcas de coches -->
        <label for="marca">Marca:</label>
        <select name="marca" id="marca">
            <option value="">--Seleccione una marca--</option>
            <?php
            // Generar opciones del combobox a partir del array, conservando la selección
            foreach ($coches as $marca => $modelos) {
                $selected = ($marca == $marcaSeleccionada) ? 'selected' : '';
                echo "<option value='$marca' $selected>$marca</option>";
            }
            ?>
        </select>
        <br><br>
        <button type="submit">Mostrar</button>
    </form>

    <?php
    // Procesar la selección cuando se envía el formulario y la marca no está vacía
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($marcaSeleccionada)) {
        // Mostrar la tabla con los modelos de la marca seleccionada
        if (array_key_exists($marcaSeleccionada, $coches)) {
            echo "<h2>Modelos de $marcaSeleccionada:</h2>";
            echo "<form method='POST' action=''>";
            echo "<input type='hidden' name='marca' value='$marcaSeleccionada'>"; // Mantener la marca seleccionada
            echo "<table border='1'>";
            echo "<tr><th>Modelo</th></tr>";

            // Variable para almacenar los modelos modificados
            $modelosModificados = [];

            // Mostrar los modelos en cajas de texto y compararlos si se envió el formulario
            foreach ($coches[$marcaSeleccionada] as $index => $modeloOriginal) {
                $inputName = "modelo_$index"; // Asignar un nombre único a cada caja de texto
                $modeloValue = isset($_POST[$inputName]) ? $_POST[$inputName] : $modeloOriginal; // Mantener el valor del modelo modificado

                // Comparar los modelos originales con los enviados
                if (isset($_POST[$inputName]) && $_POST[$inputName] !== $modeloOriginal) {
                    $modelosModificados[] = "De '$modeloOriginal' a '" . $_POST[$inputName] . "'";
                }

                // Mostrar el input con el valor actual o modificado
                echo "<tr>";
                echo "<td><input type='text' name='$inputName' value='$modeloValue'></td>";
                echo "</tr>";
            }

            echo "</table>";
            echo "<br><button type='submit'>Actualizar</button>";
            echo "</form>";

            // Mostrar los modelos modificados
            if (!empty($modelosModificados)) {
                echo "<h3>Modelos modificados:</h3>";
                echo "<ul>";
                foreach ($modelosModificados as $modificado) {
                    echo "<li>$modificado</li>";
                }
                echo "</ul>";
            } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                echo "<p>No se han modificado los modelos.</p>";
            }
        } else {
            echo "<p>Marca no encontrada.</p>";
        }
    }
    ?>
</body>
</html>