<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $dinero = 1127.24; // Cantidad en euros

    function desglose($dinero){
        // Convertimos a céntimos porque sino no me pilla los decimales
        // lo bueno esque asi no trabajamos con decimales y cuesta menos pillarlo
        $dinero = intval($dinero * 100); 
        //como uso inval, en el hipotetico caso de que algo de 0.3847 o asi
        // dara igual y se quedara con el 0
        // Creo un array que contenga cada tipo de moneda
        $monedas = array("2€" => 0, "1€" => 0, "0.50€" => 0, "0.20€" => 0, "0.10€" => 0, "0.05€" => 0, "0.02€" => 0, "0.01€" => 0);
        
        // Calculamos las monedas de 2€,
        //como lo hemos convertido a centimos seran 200 centimos
        $monedas["2€"] = intval($dinero / 200); 
        $resto = $dinero % 200; 

        //monedas de 1€
        $monedas["1€"] = intval($resto / 100); 
        $resto = $resto % 100; 

        //monedas de 50 céntimos
        $monedas["0.50€"] =intval($resto/50);
        $resto = $resto % 50;

        //monedas de 20 céntimos
        $monedas["0.20€"] =intval($resto/20);
        $resto = $resto % 20;

        //monedas de 10 céntimos
        $monedas["0.10€"] = intval($resto/10);
        $resto =$resto % 10;

        //monedas de 5 céntimos
        $monedas["0.05€"] = intval($resto/5);
        $resto = $resto % 5;

        // monedas de 2 céntimos
        $monedas["0.02€"] = intval($resto/2);
        $resto = $resto % 2;

        // monedas 1 céntimo
        $monedas["0.01€"] = intval($resto/1);

        // Devolver el desglose de monedas
        return $monedas;
    }

    
    $vuelta = desglose($dinero);
    
    // Recorrer el array incluyendo claves y valores
    foreach ($vuelta as $clave => $valor) {
        echo "Monedas de $clave: $valor<br>";
    }
    ?>
</body>
</html>
