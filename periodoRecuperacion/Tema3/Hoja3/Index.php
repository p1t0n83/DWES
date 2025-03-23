<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Ejercicio 1</h1>
    <?php
    $array1 = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
    $array2 = [11, 12, 13, 14, 15, 16, 17, 18, 19, 20];
    $mezclados = array_merge($array1, $array2);
    for ($i = 0; $i < count($mezclados); $i++) {
        echo $mezclados[$i] . " ";
    }
    echo "<br>";

    for ($j = 0; $j < count($mezclados) - 1; $j++) {
        for ($i = 0; $i < count($mezclados) - 1 - $j; $i++) {
            if ($mezclados[$i] < $mezclados[$i + 1]) {
                $t = $mezclados[$i];
                $mezclados[$i] = $mezclados[$i + 1];
                $mezclados[$i + 1] = $t;
            }
        }
    }


    for ($i = 0; $i < count($mezclados); $i++) {
        echo $mezclados[$i] . " ";
    }
    echo "<br>";
    $array3 = array_fill(0, 4, "valor"); // Llena desde índice 0 en adelante
    for ($i = 0; $i < count($array3); $i++) {
        echo $array3[$i] . " ";
    }

    ?>

    <h1>Ejercicio 2</h1>
    <?php
    $euros = 1253.99;

    // Monedas de 2 euros
    $monedasEuroDos = intval($euros / 2);
    echo "Monedas de 2 euros: " . $monedasEuroDos . "<br>";

    // Monedas de 1 euro
    $monedas1 = $euros % 2;
    echo "Monedas de 1 euro: " . $monedas1 . "<br>";

    // Obtener céntimos correctamente
    $centimos = round(($euros - intval($euros)) * 100);
    echo "Céntimos: " . $centimos . "<br>";

    // Monedas de 50 céntimos
    $monedasCincuenta = intval($centimos / 50);
    $centimos -= $monedasCincuenta * 50;
    echo "Monedas de 50 céntimos: " . $monedasCincuenta . "<br>";

    // Monedas de 20 céntimos
    $monedasVeinte = intval($centimos / 20);
    $centimos -= $monedasVeinte * 20;
    echo "Monedas de 20 céntimos: " . $monedasVeinte . "<br>";

    // Monedas de 10 céntimos
    $monedasDiez = intval($centimos / 10);
    $centimos -= $monedasDiez * 10;
    echo "Monedas de 10 céntimos: " . $monedasDiez . "<br>";

    // Monedas de 5 céntimos
    $monedasCinco = intval($centimos / 5);
    $centimos -= $monedasCinco * 5;
    echo "Monedas de 5 céntimos: " . $monedasCinco . "<br>";

    // Monedas de 2 céntimos
    $monedasDos = intval($centimos / 2);
    $centimos -= $monedasDos * 2;
    echo "Monedas de 2 céntimos: " . $monedasDos . "<br>";

    // Monedas de 1 céntimo
    echo "Monedas de 1 céntimo: " . $centimos . "<br>";
    ?>

    <h1>Ejercicio 3</h1>

    <?php
    $DNI = 72281284;
    $DNILetras = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E'];
    $resto = $DNI % 23;
    $letra = $DNILetras[$resto];
    echo "El DNI completo es: " . $DNI . "-" . $letra;
    ?>

    <h1>Ejercicio 4</h1>
    <table border="1">
        <tr>
            <th>Clave</th>
            <th>Valor</th>
        </tr>
        <?php
        foreach ($_SERVER as $clave => $valor) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($clave) . "</td>";
            echo "<td>" . htmlspecialchars($valor) . "</td>";
            echo "</tr>";
        }
        ?>
    </table>

    <h1>Ejercicio 5 </h1>
    <?php
    $articulos = [
        [
            'codigo' => 'A001',
            'descripcion' => 'Laptop Lenovo IdeaPad 3',
            'existencias' => 10
        ],
        [
            'codigo' => 'A002',
            'descripcion' => 'Monitor Samsung 24"',
            'existencias' => 15
        ],
        [
            'codigo' => 'A003',
            'descripcion' => 'Teclado mecánico Logitech',
            'existencias' => 20
        ]
    ];

    function mayor($articulos)
    {
        $valorMayor = 0;
        foreach ($articulos as $articulo) {
            if ($articulo['existencias'] > $valorMayor) {
                $valorMayor = $articulo['existencias'];
            }
        }
        $articuloEncontrado = current(array_filter($articulos, function ($articulo) use ($valorMayor) {
            return $articulo['existencias'] == $valorMayor;
        }));
        echo "Codigo del articulo con mas existencias: " . $articuloEncontrado['codigo'] . "<br>";
    }
    mayor($articulos);

    function suma($articulos)
    {
        $suma = 0;
        foreach ($articulos as $articulo) {
            $suma += $articulo['existencias'];
        }
        return $suma;
    }
    echo "La suma de todas las existencias es:" . suma($articulos) . "<br>";

    function visualizar($articulos)
    {
        $ver = "";
        foreach ($articulos as $articulo) {
            $ver .= "Codigo:" . $articulo['codigo'] . " Descripcion:" . $articulo['descripcion'] . " Existencias" . $articulo['existencias'] . "<br>";
        }
        return $ver;
    }
    echo visualizar($articulos);
    ?>

    <h1>Ejercicio 6</h1>
    <?php
    $verbos = ["comer", "dormir", "correr", "beber", "amar", "matar"];

    foreach ($verbos as $verbo) {
        // Expresión regular para encontrar "ar", "er" o "ir" al final del verbo
        $verbo_modificado = preg_replace('/(ar|er|ir)$/', 'o', $verbo, 1);
        echo $verbo_modificado . "<br>";
    }
    ?>

    
</body>

</html>