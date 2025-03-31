<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscador de Películas</title>
</head>

<body>
    <form method="post">
        <h1>Buscador de películas</h1>
        <label name="texto">Buscador:<input type="text" name="texto"></label>
        <button>Buscar</button>
    </form>
    <?php
    $peliculas = [
        "El Padrino",
        "El Señor de los Anillos",
        "Pulp Fiction",
        "Forrest Gump",
        "Matrix",
        "Gladiador",
        "Titanic",
        "Jurassic Park",
        "Star Wars",
        "Inception"
    ];

    $imagenes = [
        "padrino.png",        // Imagen para "El Padrino"
        "anillos.png",        // Imagen para "El Señor de los Anillos"
        "pulpfiction.png",    // Imagen para "Pulp Fiction"
        "forrestgump.png",    // Imagen para "Forrest Gump"
        "matrix.png",         // Imagen para "Matrix"
        "gladiador.png",      // Imagen para "Gladiador"
        "titanic.png",        // Imagen para "Titanic"
        "jurassicpark.png",   // Imagen para "Jurassic Park"
        "starwars.png",       // Imagen para "Star Wars"
        "inception.png"       // Imagen para "Inception"
    ];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $busca = strtolower($_POST['texto']);
        for ($i = 0; $i < count($peliculas); $i++) {
            if (str_contains(strtolower($peliculas[$i]), $busca)) {
                echo "<p>" . $peliculas[$i] . "</p>";
                echo "<img src='imagenes/" . $imagenes[$i] . "' alt='" . $peliculas[$i] . "' style='width:200px;'><br>";
            }
        }
    }
    ?>
</body>

</html>