<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Busca tu coche</title>
</head>

<body>
    <h1>Busca tu coche</h1>
    <hr>
    <form method="post" action="">
        <label for="marca">Marca:
            <select name="marca">
                <option value="seat" <?php if (isset($_POST['marca']) && $_POST['marca'] == 'seat')
                    echo 'selected'; ?>>
                    Seat</option>
                <option value="mercedes" <?php if (isset($_POST['marca']) && $_POST['marca'] == 'mercedes')
                    echo 'selected'; ?>>Mercedes</option>
                <option value="ferrari" <?php if (isset($_POST['marca']) && $_POST['marca'] == 'ferrari')
                    echo 'selected'; ?>>Ferrari</option>
            </select>
        </label>
        <button type="submit">Ver coches</button>
    </form>
    <?php
    $coches = [
        "seat" => ["Ibiza", "León", "Arona", "Ateca", "Tarraco", "Toledo"],
        "mercedes" => ["Clase A", "Clase C", "Clase E", "GLA", "GLC", "GLE"],
        "ferrari" => ["488 Spider", "Roma", "Portofino", "SF90 Stradale", "F8 Tributo", "LaFerrari"],
    ];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $coches['marca']=$_POST['actualizados'];
        $marca = $_POST['marca'];
        echo "<form method='post' action=''><table>";
        for ($i = 0; $i < count($coches[$marca]); $i++) {
            echo "<label for='actualizados'><input name='actualizados[]' value='" . $coches[$marca][$i] . "'></label><br>";
        }
        echo "<label for='marca'><input type='hidden' name='marca' value='".$marca."'></label>";
        echo "<button>Actualizar</button>";
        echo "</table></form>";
        

        if (isset($_POST['actualizados'])) {
            $actualizados = $_POST['actualizados'];
            $marca=$_POST['marca'];
            $actualizadosTexto = "";
            for ($i = 0; $i < count($coches[$marca]); $i++) {
                if ($actualizados[$i] != $coches[$marca][$i]) {
                    $actualizadosTexto .= "Se ha cambiado " . $coches[$marca][$i] . " por " . $actualizados[$i] . "<br>";
                    $coches[$marca][$i]=$actualizados[$i];
                    
                }
            }
            
            echo $actualizadosTexto;
        }
    }

    ?>
</body>

</html>