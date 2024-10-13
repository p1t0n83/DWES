<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recogiendo los números del formulario
    $menor = isset($_POST['menor']) ? intval($_POST['menor']) : null;
    $mayor = isset($_POST['mayor']) ? intval($_POST['mayor']) : null;

    if ($menor !== null && $mayor !== null && $menor < $mayor) {
        echo "<h2>Lista de pares de números:</h2>";   
        // Mostrar pares de números
        for ($i = $menor; $i <= $mayor; $i++) {
            echo "(" . $i . "," . ($mayor - ($i - $menor)) . ")";
        }
    } else {
        echo "<h2>Error: Asegúrate de que el número menor sea menor que el número mayor.</h2>";
    }
}
?>

<br>
<a href="index.html">Volver</a>