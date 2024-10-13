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
            "Pacific Rim" => "pacific_rim.png",
            "El señor de los anillos: La comunidad del anillo" => "lotr.png",
            "Toy Story" => "toy_story.png",
            "Monster Hunter" => "monster_hunter.png",
            "Jujutsu Kaisen 0" => "jujutsu_kaisen.png",
            "Dragon Ball Super: Broly" => "dbs_broly.png",
            "El padrino" => "el_padrino.png",
            "Titanic" => "titanic.png",
            "El hobbit: Un viaje inesperado" => "el_hobbit.png",
            "Kingsman: El círculo de oro" => "kingsman.png"
        );
        
        $nombres = array_keys($peliculas);

        for ($i = 0; $i < count($nombres); $i++) {
            if (stripos($nombres[$i], $cadena) !== false) { // Buscar en los nombres de las películas
                $nombre = $nombres[$i]; // Nombre de la película
                $imagen = $peliculas[$nombre]; // Obtener la imagen correspondiente

                // Mostrar el nombre y la imagen de la película
                echo "<p>$nombre</p>";
                echo "<img src='imagenes/$imagen' alt='$nombre' width='400'>";
            }
        }
    }
    ?>

</body>

</html>