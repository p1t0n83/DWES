<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
function validarCuentaCorriente($cuenta) {
    // Validar el formato de la cuenta
    if (strlen($cuenta) !== 24 || substr($cuenta, 4, 1) !== '-' || 
        substr($cuenta, 9, 1) !== '-' || substr($cuenta, 12, 1) !== '-') {
        return "El formato de la cuenta no es válido.";
    }

    // Extraer las partes de la cuenta
    $codigoEntidad = substr($cuenta, 0, 4);
    $codigoOficina = substr($cuenta, 5, 4);
    $digitosControl = substr($cuenta, 10, 2);
    $numeroCuenta = substr($cuenta, 13, 10);
    
    // Verificar los dígitos de control
    if (comprobarDigitosControl($codigoEntidad, $codigoOficina, $numeroCuenta, $digitosControl)) {
        return "Los dígitos de control son correctos.";
    } else {
        return "Los dígitos de control son incorrectos.";
    }
}

function comprobarDigitosControl($codigoEntidad, $codigoOficina, $numeroCuenta, $digitosControl) {
    // Convertir los valores a números enteros
    $codigoEntidad = (int)$codigoEntidad;
    $codigoOficina = (int)$codigoOficina;
    $numeroCuenta = (int)$numeroCuenta;

    // Calcular el dígito de control
    // Esta es una fórmula simplificada. Debes usar la fórmula específica para tu país.
    $total = ($codigoEntidad + $codigoOficina + $numeroCuenta) % 97;

    // Generar los dígitos de control a partir del total
    $digitosControlCalculados = str_pad(97 - $total, 2, '0', STR_PAD_LEFT);

    // Comparar los dígitos de control calculados con los proporcionados
    return $digitosControl === $digitosControlCalculados;
}

// Ejemplo de uso
$cuenta = '1234-5678-12-1234567890'; // Modifica esta línea para probar diferentes cuentas
$resultado = validarCuentaCorriente($cuenta);
echo $resultado;
    ?>
</body>
</html>