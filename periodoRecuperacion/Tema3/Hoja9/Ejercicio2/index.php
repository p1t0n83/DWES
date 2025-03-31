<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post">
    <h1>Buscador de peliculas</h1>
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

    if($_SERVER['REQUEST_METHOD']=='POST'){
        $busca=strtolower($_POST['texto']);
        for($i=0;$i<count($peliculas);$i++){
             if(str_contains(strtolower($peliculas[$i]),$busca)){
                   echo $peliculas[$i].'<br>';
             }
        }    }
    ?>
</body>

</html>