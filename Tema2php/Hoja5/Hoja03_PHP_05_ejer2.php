<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    //clase cuenta
    class Cuenta
    {
        protected int $numero;
        protected string $titular;
        protected float $saldo;

        public function __construct($numero, $titular, $saldo)
        {
            $this->numero = $numero;
            $this->titular = $titular;
            $this->saldo = $saldo;
        }

        public function ingreso($cantidad): void
        {
            if ($cantidad > 0) {
                $this->saldo += $cantidad;
            } else {
                echo "No se pudo ingresar <br/>";
            }
        }

        public function reintegro($cantidad): void
        {
            if ($cantidad < 0) {
                $cantidad = -$cantidad;
            }
            if ($this->saldo - $cantidad >= 0) {
                $this->saldo -= $cantidad;
            } else {
                echo "No se pudo restar <br/>";
            }
        }

        public function esPreferencia($cantidad)
        {
            return $this->cantidad > $cantidad ? true : false;
        }

        public function mostrar()
        {
            echo "<p>Numero de cuenta:" . $this->numero . "</p>";
            echo "<p>Nombre del titular de la cuenta:" . $this->titular . "</p>";
            echo "<p>Saldo de la cuenta:" . $this->saldo . "</p>";
        }
    }
    //clase cuenta corriente hija de cuenta
    class CuentaCorriente extends Cuenta
    {
        private $cuota_mantenimiento;

        public function __construct($cuota_mantenimiento, $numero, $titular, $saldo)
        {
            //parent para referenciar el constructor del padre
            parent::__construct($numero, $titular, ($saldo - $cuota_mantenimiento));
            $this->cuota_mantenimiento = $cuota_mantenimiento;
        }


        public function reintegro($cantidad): void
        {
            if ($cantidad < 0) {
                $cantidad = -$cantidad;
            }
            if ($this->saldo - $cantidad >= 0 && $cantidad > 20) {
                $this->saldo -= $cantidad;
            } else {
                echo "No se pudo restar <br/>";
            }
        }

        public function mostrar(): void
        {
            echo "<p>Numero de cuenta:" . $this->numero . "</p>";
            echo "<p>Nombre del titular de la cuenta:" . $this->titular . "</p>";
            echo "<p>Saldo de la cuenta:" . $this->saldo . "</p>";
            echo "<p>Cuota de mantenimiento de la cuenta:" . $this->cuota_mantenimiento . "</p>";
        }
    }

    //clase cuenta ahorro hija de cuenta
    class CuentaAhorro extends Cuenta
    {
        private $comision_apertura;
        private $intereses;

        public function __construct($comision_apertura, $intereses, $numero, $titular, $saldo)
        {
            //parent para referenciar el constructor del padre
            parent::__construct($numero, $titular, ($saldo - $comision_apertura));
            $this->comision_apertura = $comision_apertura;
            $this->intereses = $intereses;
        }


        public function aplicarInteres(): void
        {
            $this->saldo += ($this->saldo * ($this->intereses / 100));
        }

        public function mostrar()
        {
            echo "<p>Numero de cuenta:" . $this->numero . "</p>";
            echo "<p>Nombre del titular de la cuenta:" . $this->titular . "</p>";
            echo "<p>Saldo de la cuenta:" . $this->saldo . "</p>";
            echo "<p>Comision de apertura de la cuenta:" . $this->comision_apertura . "</p>";
            echo "<p>Intereses de la cuenta:" . $this->intereses . "</p>";
        }
    }
    ?>
</body>

</html>