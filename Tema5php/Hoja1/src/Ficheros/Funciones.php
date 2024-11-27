<?php 

    // Método estático para validar el DNI
    function validarDNI(string $dni): bool
    {
        // Formato correcto: 8 números seguidos de una letra
        // el /i ignora mayusculas y minusculas
        if(!preg_match('/^\d{8}[A-Z]$/i', $dni)){
            return false;
        }

        // Extraer los números y la letra
        $numero = substr($dni, 0, 8);
        $letra = strtoupper(substr($dni, -1));

        // Letras válidas según el módulo 23
        $letrasValidas = "TRWAGMYFPDXBNJZSQVHLCKE";

        // Verificar si la letra coincide con el cálculo del número
        return $letra === $letrasValidas[$numero % 23];
    }

?>