<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Buscador de peliculas</h1>
    <hr />
    <form name="input" action="" method="post"> 
    <label for="cadena">Buscador:</label>
    <input type="text" name="cadena" id="cadena" />
    <br />
    <input type="submit" value="Buscar">
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['cadena'])) {


        $cadena = trim(strtolower($_POST['cadena']));
        $peliculas = array(
            "Pacific Rim",
            "El señor de los anillos:La comunidad del anillo",
            "Toy Story",
            "Monster Hunter",
            "Jujutsu Kaisen 0",
            "Dragon Ball Super:Broly",
            "El padrino",
            "El titanic",
            "El hobbit:Ujn viaje inesperado",
            "Kingsman:El circulo de oro"
        );
        for ($i = 0; $i < count($peliculas); $i++) {
            if (stripos($peliculas[$i], $cadena) !== false) { // stripos busca sin importar mayúsculas
                echo "<p>" . $peliculas[$i] . "</p>";
            }
        }
    }
    ?>

</body>

</html>