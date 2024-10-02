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



   
    function UrgenciasMas60($medicos){
        // Mostrar el número de médicos de turno de tarde de urgencias que tienen más de 60 años
        $contadorUrgenciasTarde = 0;
        //recorremos el array de medicos con un bucle foreach
        foreach ($medicos as $medico) {
            //con instanceof podemos ver cuales son de Urgencias y vamos sumando +1 al contador cada vez que encuentre 1
            if ($medico instanceof Urgencia && $medico->getTurno() == turno::TARDE && $medico->getEdad() > 60) {
                $contadorUrgenciasTarde++;
            }
        }
        
        echo "Número de médicos de urgencias en turno de tarde y mayores de 60 años: $contadorUrgenciasTarde\n";
            }

    UrgenciasMas60($medicos);

    function conMasPAcientes($medicos){
// Ver los datos de los médicos de familia con un número igual o superior de pacientes a un valor dado (por ejemplo, 20)
$pacientesMinimos = 20;
//recorremos el array de medicos con un bucle foreach
echo("<h2>Medicos de familia con mas de $pacientesMinimos pacientes</h2>");
foreach ($medicos as $medico) {
    //con instanceof podemos ver cuales son medicos de familia e ir viendo cuales tienen el mismo o mayor numero de pacientes al indicado
    if ($medico instanceof Familia && $medico->getPacientes() >= $pacientesMinimos) {
        echo "Médico de familia: " . $medico->getNombre() . " con " . $medico->getPacientes() . " pacientes.<br/>";
    }
}
    }
    conMasPAcientes($medicos)
?>
    
</body>
</html>