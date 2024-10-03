<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    interface Volador
    {
        public function acelerar(int $velocidad): void;
    }

    abstract class ElementoVolador implements Volador
    {
        protected string $nombre;
        protected int $numAlas;
        protected int $numMotores;
        protected int $altitud;

        protected int $velocidad;

        public function __construct(string $nombre, int $numAlas, int $numMotores, int $altitud, int $velocidad)
        {
            $this->nombre = $nombre;
            $this->numAlas = $numAlas;
            $this->numMotores = $numMotores;
            $this->altitud = $altitud;
            $this->velocidad = $velocidad;
        }

        public function getVelocidad()
        {
            return $this->velocidad;
        }
        public function volando(): bool
        {
            return $this->altitud > 0 ? true : false;
        }

        public function acelerar(int $velocidad): void
        {
            $this->velocidad = $velocidad;
        }
        public abstract function volar(int $altitud);
        public abstract function mostrarInformacion();


    }

    class Avion extends ElementoVolador
    {
        private string $companiaAerea;
        private DateTime $fechaAlta;
        private int $altitudMaxima;

        public function __construct(string $nombre, int $numAlas, int $numMotores, int $altitud, string $companiaAerea, int $velocidad, DateTime $fechaAlta, int $altitudMaxima)
        {
            parent::__construct($nombre, $numAlas, $numMotores, $altitud, $velocidad);
            $this->fechaAlta = $fechaAlta;
            $this->altitudMaxima = $altitudMaxima;
        }


        public function volar(int $altitudDeseada): void
        {
            if ($altitudDeseada > 0 && $altitudDeseada <= $this->altitudMaxima) {
                if ($this->getVelocidad() > 150) {
                    while ($this->altitud < $altitudDeseada) {
                        $this->altitud += 100;
                        if ($this->altitud > $altitudDeseada) {
                            $this->altitud = $altitudDeseada; // Para evitar superar la altitud objetivo
                        }
                        echo "Altitud actual: " . $this->altitud . " metros<br>";
                    }

                    echo "Avión ha alcanzado la altitud de " . $this->altitud . " metros.<br>";
                } else {
                    echo "No se puede volar";
                }
            } else {
                echo "No se puede volar";
            }
        }

        public function volando(): bool
        {
            return $this->altitud > 0 ? true : false;
        }

        public function mostrarInformacion()
        {
            echo "Nombre: " . $this->nombre .
                ", Número de alas: " . $this->numAlas ."<br/>".
                ", Número de motores: " . $this->numMotores ."<br/>".
                ", Altitud actual: " . $this->altitud . " metros,<br/>" .
                "Velocidad actual: " . $this->velocidad ."<br/>".
                " km/h, Compañía aérea: " . $this->companiaAerea ."<br/>".
                ", Fecha de alta: " . $this->fechaAlta->format('Y-m-d') ."<br/>".
                ", Altitud máxima permitida: " . $this->altitudMaxima . " metros.<br>";
        }

    }

    class Helicoptero extends ElementoVolador
    {
        private string $propietario;
        private int $nRotor;

        public function __construct(string $nombre, int $numAlas, int $numMotores, int $altitud, string $companiaAerea, int $velocidad, string $propietario, int $nRotor)
        {
            parent::__construct($nombre, $numAlas, $numMotores, $altitud, $velocidad);
            $this->propietario = $propietario;
            $this->nRotor = $nRotor;
        }

        public function volar(int $altitudEsperada)
        {
            if ($altitudEsperada <= (100 * $this->nRotor)) {
                while ($this->altitud < $altitudEsperada) {
                    $this->altitud += 20;
                    if ($this->altitud > $altitudEsperada) {
                        $this->altitud = $altitudEsperada; // Para evitar superar la altitud objetivo
                    }
                    echo "Altitud actual: " . $this->altitud . " metros<br>";
                }

                echo "Helicoptero ha alcanzado la altitud de " . $this->altitud . " metros.<br>";

            }
        }
        public function volando(): bool
        {
            return $this->altitud > 0 ? true : false;
        }

        public function mostrarInformacion()
        {
            echo "Nombre: " . $this->nombre .
                ", Número de alas: " . $this->numAlas ."<br/>".
                ", Número de motores: " . $this->numMotores ."<br/>".
                ", Altitud actual: " . $this->altitud . " metros,<br/>" .
                "Velocidad actual: " . $this->velocidad ."<br/>".
                " km/h, Compañía aérea: " . $this->companiaAerea ."<br/>".
                ", Propietario: " . $this->propietario ."<br/>".
                ", Numero de rotores: " . $this->nRotor . " metros.<br>";
        }

    }

    ?>
</body>

</html>