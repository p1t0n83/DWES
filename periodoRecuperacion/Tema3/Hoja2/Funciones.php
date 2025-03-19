<?php

function fechaFormateada(): string
{
    $date = date_format(new DateTime(), 'Y');
    $dia = date_format(new DateTime(), 'D');
    $diaNumero = date_format(new DateTime(), 'd');
    $mes = date_format(new DateTime(), 'M');
    $diaFormateado = "";
    $mesFormateado = "";
    switch ($dia) {
        case "Sun": {
                $diaFormateado = "Domingo";
                break;
            }
        case "Mon": {
                $diaFormateado = "Lunes";
                break;
            }
        case "Tue": {
                $diaFormateado = "Martes";
                break;
            }
        case "Wed": {
                $diaFormateado = "Miercoles";
                break;
            }
        case "Thu": {
                $diaFormateado = "Jueves";
                break;
            }
        case "Fri": {
                $diaFormateado = "Viernes";
                break;
            }
        case "Sat": {
                $diaFormateado = "Sabado";
                break;
            }
    }
    switch ($mes) {
        case "Jan": {
                $mesFormateado = "Enero";
                break;
            }
        case "Feb": {
                $mesFormateado = "Febrero";
                break;
            }
        case "Mar": {
                $mesFormateado = "Marzo";
                break;
            }
        case "Apr": {
                $mesFormateado = "Abril";
                break;
            }
        case "May": {
                $mesFormateado = "Mayo";
                break;
            }
        case "Jun": {
                $mesFormateado = "Junio";
                break;
            }
        case "Jul": {
                $mesFormateado = "Julio";
                break;
            }
        case "Aug": {
                $mesFormateado = "Agosto";
                break;
            }
        case "Sep": {
                $mesFormateado = "Septiembre";
                break;
            }
        case "Oct": {
                $mesFormateado = "Octubre";
                break;
            }
        case "Nov": {
                $mesFormateado = "Noviembre";
                break;
            }
        case "Dec": {
                $mesFormateado = "Diciembre";
                break;
            }
    }
    return $diaFormateado . "," . $diaNumero . " de " . $mesFormateado . " de " . $date;
}

function suma($num1, $num2)
{
    echo ("La suma de " . $num1 . " y " . $num2 . " es " . ($num1 + $num2));
}

function imprimirMensaje($mensaje)
{
    echo ($mensaje);
}

function calcularInteresSimple($capital, $redito, $tiempo)
{
    $tasa = $redito / 100;
    $interes = $capital * $tasa * $tiempo;
    $monto = $capital + $interes;

    return [
        'interes' => $interes,
        'monto' => $monto
    ];
}

function calcularInteresCompuesto($capital, $redito, $tiempo)
{
    $tasa = $redito / 100;
    $monto = $capital * pow((1 + $tasa), $tiempo);
    $interes = $monto - $capital;

    return [
        'interes' => $interes,
        'monto' => $monto
    ];
}

function capicua($numero)
{
    $numero1 = intval($numero % 10); //1
    $resta = intval($numero / 10); //13
    $numero2 = intval($resta / 10); //1
    if ($numero1 == $numero2) {
        echo ("el numero " . $numero . " es capicua <br>");
    } else {
        echo ("No es capicua <br>");
    }
}

function redondear($numero)
{
    $redondeado = round($numero);
    echo ("Numero " . $numero . " redondeado:" . $redondeado . "<br>");
}

function cuentaDigitos($numero)
{
    $digitos = 0;
    $terminar = false;
    $resto = 0;
    $nuevo = $numero;
    do {
        $nuevo = intval($nuevo / 10);
        if ($nuevo == 0) {
            $digitos++;
            $terminar = true;
        } else {
            $digitos++;
        }
    } while (!$terminar);
    echo ("El numero " . $numero . " tiene " . $digitos . " digitos");
}

function fechaCorrecta($fecha)
{
    $dia = substr($fecha, 0, 2);
    $mes = substr($fecha, 3, 2);
    $valido = false;
    if ($mes >= 1 && $mes <= 12) {
        if ($mes == '02') {
            if ($dia <= 29 && $dia >= 1) {
                echo ("La fecha es valida");
            } else {
                echo ("El dia no es valido");
            }
        } else {
            if ($dia <= 31 && $dia >= 1) {
                echo ("La fecha es valida");
            } else {
                echo ("El dia no es valido");
            }
        }
    } else {
        echo ("El mes no es correcto");
    }
}

function validarCuentaCorriente($CC, $entidad, $oficina, $digitosControl, $cuenta)
{
    // Código inicial para el primer dígito de control
    $codigoInicialPrimerDigito = '00' . $entidad . $oficina;
    $pesosFijos = [1, 2, 4, 8, 5, 10, 9, 7, 3, 6];

    // Cálculo del primer dígito de control
    $sumaProductos = 0;
    for ($peso = 0; $peso < 10; $peso++) {
        $sumaProductos += intval(substr($codigoInicialPrimerDigito, $peso, 1)) * $pesosFijos[$peso];
    }
    $resto = $sumaProductos % 11;
    $digito1 = 11 - $resto;
    if ($digito1 == 11) {
        $digito1 = 0;
    } else if ($digito1 == 10) {
        $digito1 = 1;
    }

    // Cálculo del segundo dígito de control
    $sumaProductos = 0;
    for ($peso = 0; $peso < 10; $peso++) {
        $sumaProductos += intval(substr($cuenta, $peso, 1)) * $pesosFijos[$peso];
    }
    $resto = $sumaProductos % 11;
    $digito2 = 11 - $resto;
    if ($digito2 == 11) {
        $digito2 = 0;
    } else if ($digito2 == 10) {
        $digito2 = 1;
    }

    // Comparar con los dígitos de control proporcionados
    $digitosGenerados = strval($digito1) . strval($digito2);
    $esValido = ($digitosControl == $digitosGenerados) ? "✅ Válido" : "❌ No válido";

    // Mostrar resultados
    echo ("Código de cuenta pasado: " . $CC . "<br>");
    echo ("Código de oficina pasado: " . $oficina . "<br>");
    echo ("Dígitos de control pasado: " . $digitosControl . "<br>");
    echo ("Dígitos de control generados: " . $digitosGenerados . "<br>");
    echo ("Código de entidad: " . $entidad . "<br>");
    echo ("Número de la cuenta: " . $cuenta . "<br>");
    echo ("Resultado de validación: " . $esValido . "<br>");
}

