<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documento</title>
</head>
<body>
    <?php
    $DNI = 72281284; // Número del DNI

    function calcularLetraDNI($numero) {
        $resto =$numero % 23; // Calcular el resto de la división del DNI entre 23
        $letras = [ 0 => 'T',1 => 'R',2 => 'W',3 => 'A',4 => 'G',5 => 'M',6 => 'Y',7 => 'F',8 => 'P',9 => 'D',
            10 => 'X',11 => 'N',12 => 'J',13 => 'Z',14 => 'S',15 => 'Q',16 => 'V',17 => 'H',18 => 'L',19 => 'C',20 => 'K',21 => 'E'];
        
        // Retornar la letra correspondiente
        return isset($letras[$resto]) ? $letras[$resto] : 'Número no válido';
    }

    $letra = calcularLetraDNI($DNI);
    echo "La letra correspondiente al DNI $DNI es: $letra";
    ?>
</body>
</html>
