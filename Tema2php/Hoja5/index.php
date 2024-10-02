<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include("Hoja03_PHP_05_ejer2.php");
    // Crear objetos de CuentaCorriente y CuentaAhorro
    $cuentaCorriente = new CuentaCorriente(10, "001", "Juan Pérez", 1000);
    $cuentaAhorro = new CuentaAhorro(50, 5, "002", "María López", 1500);

    // Mostrar información de la cuenta corriente
    echo "<h2>Información de la Cuenta Corriente:</h2>";
    $cuentaCorriente->mostrar();
    $cuentaCorriente->ingreso(200);
    $cuentaCorriente->reintegro(10);
    echo "<h3>La mostramos de nuevo tras los cambios</h3>";
    $cuentaCorriente->mostrar();

    // Mostrar información de la cuenta de ahorro
    echo "<h2>Información de la Cuenta de Ahorro:</h2>";
    $cuentaAhorro->mostrar();
    $cuentaAhorro->aplicarInteres();
    echo "<h3>La mostramos de nuevo tras los cambios</h3>";
    $cuentaAhorro->mostrar();
    ?>

    <?php
    include("Hoja03_PHP_05_ejer3.php");
    $medicos=array();
    $medico1=new Familia(60,"Iker Garcia Iturri",19,turno::MANIANA);
    $medico2=new Familia(40,"Alberto Gonzalez Fernandez",20,turno::TARDE);
    $medico3=new Familia(20,"Elsa Ferreiro Calvo",20,turno::MANIANA);
    $medico4=new Urgencia("noise","Angel Fernandez Labrador",80,turno::MANIANA);
    $medico5=new Urgencia("noise","Manu",40,turno::MANIANA);
    $medico6=new Urgencia("noise","Alejandro",65,turno::TARDE);
    array_push($medicos,$medico1,$medico2,$medico3,$medico4,$medico5,$medico6);

    
    ?>
    
</body>
</html>