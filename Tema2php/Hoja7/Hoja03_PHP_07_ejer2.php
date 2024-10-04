<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    trait mostrarInformacion
    {
        function mostrarInformacionPersonal($nombre, $edad, $direccion)
        {
            echo "Informacion personal del empleado " . $nombre . ".<br/> Edad:" . $edad . ".<br/> Direccion:" . $direccion."<br/>";
        }
        function mostrarInformacionLaboral($codigoEmpleado, $salario)
        {
            echo "Informacion laboral del empleado con codigo:" . $codigoEmpleado . ".<br/> Salario:" . $salario."<br/>";
        }
    }

    class Empleado
    {
        use mostrarInformacion;
        //personal
        private string $nombre;
        private int $edad;
        private string $direccion;
        //laboral
        private string $codigoEmpleado;
        private float $salario;

        public function __construct(string $nombre, int $edad, string $direccion, string $codigoEmpleado, $salario)
        {
            $this->nombre = $nombre;
            $this->edad = $edad;
            $this->direccion = $direccion;
            $this->codigoEmpleado = $codigoEmpleado;
            $this->salario = $salario;
        }

        public function __get($variable){
            return $this->$variable;
        }
        public function __set($variable,$valor){
           $this->$variable = $valor;
        }
    }
    ?>
</body>

</html>