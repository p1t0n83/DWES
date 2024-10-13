<?php
    if($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST["origen"]) && !empty($_POST["destino"])) {
        if(!empty($_POST['cantidad'])) {
            $cantidad = $_POST['cantidad'];
            $origen = $_POST["origen"];
            $destino = $_POST["destino"];

            $resultado = 0;

            // Tasas de conversión
            $euroADolar = 1.1;   // 1 Euro = 1.1 Dólares
            $dolarAEuro = 0.91;  // 1 Dólar = 0.91 Euros
            $euroAYen = 144.54;  // 1 Euro = 144.54 Yenes
            $yenAEuro = 0.0069;  // 1 Yen = 0.0069 Euros
            $dolarAYen = 133.00; // 1 Dólar = 133.00 Yenes
            $yenADolar = 0.0075; // 1 Yen = 0.0075 Dólares

            // Condiciones de conversión
            if($origen === "euro" && $destino === "dolar") {
                $resultado = $cantidad * $euroADolar;
            } elseif($origen === "dolar" && $destino === "euro") {
                $resultado = $cantidad * $dolarAEuro;
            } elseif($origen === "euro" && $destino === "yen") {
                $resultado = $cantidad * $euroAYen;
            } elseif($origen === "yen" && $destino === "euro") {
                $resultado = $cantidad * $yenAEuro;
            } elseif($origen === "dolar" && $destino === "yen") {
                $resultado = $cantidad * $dolarAYen;
            } elseif($origen === "yen" && $destino === "dolar") {
                $resultado = $cantidad * $yenADolar;
            } else {
                $resultado = $cantidad; // Si origen y destino son iguales
            }

            echo "<h2>Resultado de la conversión</h2>";
            echo "Cantidad: " . $cantidad . " " . $origen . "<br>";
            echo "Convertido a: " . $destino . " es " . round($resultado, 2);
        }
    }
?>
