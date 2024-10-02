<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    class Monedero
    {
        private $dinero;
        static $numero_monederos;

        public function __construct($dinero)
        {
            $this->dinero = $dinero;
            //usamos los :: para usar las variables estaticas, sino no se puede con ->,como esta siendo invocado en si mismo ponemos self, sino seria el nombre de la clase
            self::$numero_monederos++;
        }

        public function meterDinero($dinero): void
        {
            if ($dinero > 0) {
                $this->dinero += $dinero;
                echo "Se aumento el dinero en el monedero<br/>";
            } else {
                echo "No se pudo aumentar el dinero<br/>";
            }
        }

        public function sacarDinero($dinero): void
        {
            if ($dinero < 0) {
                $dinero = +$dinero;
            }
            if ($this->dinero - $dinero >= 0) {
                $this->dinero -= $dinero;
                echo "Se pudo sacar dinero del monedero<br/>";
            } else {
                echo "No se pudo sacar dinero del monedero<br/>";
            }
        }

        public function consultarDinero(): void
        {
            echo "El saldo actual del monedero es de " . $this->dinero . "<br/>";
        }

        // Creo un metodo para borrar monederos y que me los descuente del contador
        public static function borrarMonedero(Monedero $monedero): void
        {
            unset($monedero); // Destruir el objeto pasado como argumento
            self::$numero_monederos--;
            echo "Quedan: " . self::$numero_monederos . " monederos <br/>";
        }
    }
    ?>
</body>

</html>