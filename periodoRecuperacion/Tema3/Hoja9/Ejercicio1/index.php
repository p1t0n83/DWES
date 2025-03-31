<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de Monedas</title>
</head>

<body>
    <h1>Conversor de monedas</h1>
    <hr>
    <form action="" method="GET">
        <label name="cantidad">Cantidad:<input type="number" name="cantidad" step="0.01" required></label>
        <label name="origen">Origen:
            <select name="origen">
                <option value="euro">Euro</option>
                <option value="dolarE">Dólar Estadounidense</option>
                <option value="dolarC">Dólar Canadiense</option>
            </select>
        </label>

        <label name="destino">Destino:
            <select name="destino">
                <option value="euro">Euro</option>
                <option value="dolarE">Dólar Estadounidense</option>
                <option value="dolarC">Dólar Canadiense</option>
            </select>
        </label>
        <button>Convertir</button>
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['cantidad'], $_GET['origen'], $_GET['destino'])) {
        $cantidad = floatval($_GET['cantidad']);
        $origen = $_GET['origen'];
        $destino = $_GET['destino'];

        if ($origen != $destino) {
            $resultado = 0;

            switch ($origen) {
                case "euro":
                    switch ($destino) {
                        case "dolarE":
                            echo "<p>Convirtiendo de Euro a Dólar Estadounidense...</p>";
                            $resultado = $cantidad * 1.1; // 1 Euro = 1.1 USD
                            break;
                        case "dolarC":
                            echo "<p>Convirtiendo de Euro a Dólar Canadiense...</p>";
                            $resultado = $cantidad * 1.5; // 1 Euro = 1.5 CAD
                            break;
                    }
                    break;

                case "dolarE":
                    switch ($destino) {
                        case "euro":
                            echo "<p>Convirtiendo de Dólar Estadounidense a Euro...</p>";
                            $resultado = $cantidad * 0.91; // 1 USD = 0.91 Euros
                            break;
                        case "dolarC":
                            echo "<p>Convirtiendo de Dólar Estadounidense a Dólar Canadiense...</p>";
                            $resultado = $cantidad * 1.36; // 1 USD = 1.36 CAD
                            break;
                    }
                    break;

                case "dolarC":
                    switch ($destino) {
                        case "dolarE":
                            echo "<p>Convirtiendo de Dólar Canadiense a Dólar Estadounidense...</p>";
                            $resultado = $cantidad * 0.74; // 1 CAD = 0.74 USD
                            break;
                        case "euro":
                            echo "<p>Convirtiendo de Dólar Canadiense a Euro...</p>";
                            $resultado = $cantidad * 0.67; // 1 CAD = 0.67 Euros
                            break;
                    }
                    break;
            }

            echo "<p>$cantidad $origen equivale a $resultado $destino.</p>";
        } else {
            echo "<p>Tienen que ser tipos de monedas diferentes.</p>";
        }
    }
    ?>
</body>

</html>