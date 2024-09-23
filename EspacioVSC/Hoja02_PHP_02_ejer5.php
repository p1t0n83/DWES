<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    //vamos a ver el tupo de variable que se le asigna cada vz con gettype()
    $temporal="juan";
    $valor=gettype($temporal);
    echo"<p> Tras asignarle el valor juan se ha convertido en $valor<p>";
    $temporal=3.14;
    $valor=gettype($temporal);
    echo"<p> Tras asignarle el valor 3.14 se ha convertido en $valor<p>";
    $temporal=false;
    $valor=gettype($temporal);
    echo"<p> Tras asignarle el valor false se ha convertido en $valor<p>";
    $temporal=3;
    $valor=gettype($temporal);
    echo"<p> Tras asignarle el valor 3 se ha convertido en $valor<p>";
    $temporal=null;
    $valor=gettype($temporal);
    echo"<p> Tras asignarle el valor null se ha convertido en $valor<p>";
    ?>
</body>
</html>