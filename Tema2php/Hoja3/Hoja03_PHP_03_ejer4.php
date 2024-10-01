<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Valores de $_SERVER</title>
</head>
<body>
    <h1>Valores de $_SERVER</h1>
    <table>
        <tr>
            <th>Variable</th>
            <th>Valor</th>
        </tr>
        <?php
        // Recorrer el array $_SERVER con foreach
        foreach ($_SERVER as $variable => $valor) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($variable) . "</td>";
            echo "<td>" . htmlspecialchars($valor) . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
