<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Ejercicio 1</h1>
    <?php
     require_once "ejercicio1.php";
     $empleado=new Empleado(50);
     $encargado=new Encargado(50);

     echo "El sueldo del empleado: ".$empleado->__get('sueldo')."<br>";
     echo "El sueldo del empleado: ".$encargado->__get('sueldo')."<br>";
    ?>
</body>

</html>