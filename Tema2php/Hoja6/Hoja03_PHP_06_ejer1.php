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

        public function getNombre(): string
        {
            return $this->nombre;
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
            $this->companiaAerea = $companiaAerea;
        }


        public function volar(int $altitudDeseada): void
        {
            if ($altitudDeseada > 0 && $this->altitudMaxima>=$altitudDeseada) {
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

        public function getCompania(): string
        {
            return $this->companiaAerea;
        }
        public function mostrarInformacion(): void
        {
            echo "Nombre: " . $this->nombre . "<br/>" .
                "Número de alas: " . $this->numAlas . ".<br/>" .
                "Número de motores: " . $this->numMotores . ".<br/>" .
                "Altitud actual: " . $this->altitud . " metros.<br/>" .
                "Velocidad actual: " . $this->velocidad . " km/h.<br/>" .
                "Compañía aérea: " . $this->companiaAerea . ".<br/>" .
                "Fecha de alta: " . $this->fechaAlta->format('Y-m-d') . ".<br/>" .
                "Altitud máxima permitida: " . $this->altitudMaxima . " metros.<br>";
        }

    }

    class Helicoptero extends ElementoVolador
    {
        private string $propietario;
        private int $nRotor;

        public function __construct(string $nombre, int $numAlas, int $numMotores, int $altitud, int $velocidad, string $propietario, int $nRotor)
        {
            parent::__construct($nombre, $numAlas, $numMotores, $altitud, $velocidad, );
            $this->propietario = $propietario;
            $this->nRotor = $nRotor;

        }

        public function volar(int $altitudEsperada)
        {
            if ( (100 * $this->nRotor)>=$altitudEsperada) {
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

        public function getRotores()
        {
            return $this->nRotor;
        }
        public function mostrarInformacion()
        {
            echo "Nombre: " . $this->nombre . ".<br/>" .
                " Número de motores: " . $this->numMotores . ".<br/>" .
                "Altitud actual: " . $this->altitud . " metros.<br/>" .
                "Velocidad actual: " . $this->velocidad . ".<br/>" .
                "Propietario: " . $this->propietario . ".<br/>" .
                "Numero de rotores: " . $this->nRotor . ".<br>";
        }

    }
    class Aeropuerto
    {
        private $elementosVolador = array();
        public function __construct()
        {
        }

        public function insertar(ElementoVolador $elementoVolador): void
        {
            array_push($this->elementosVolador, $elementoVolador);
        }

        public function buscar($nombre): void
        {
            $cont = 0;
            foreach ($this->elementosVolador as $elemento) {
                if ($elemento->getNombre() === $nombre) {
                    echo $elemento->mostrarInformacion();
                    $cont++;
                }
            }
            if ($cont === 0) {
                echo "No se encontro el vehiculo";
            }
        }

        public function listarCompania($nombre): void
        {
            $cont = 0;
            foreach ($this->elementosVolador as $elemento) {
                if ($elemento instanceof Avion) {
                    if ($elemento->getCompania() === $nombre) {
                        echo $elemento->mostrarInformacion();
                        $cont++;
                    }
                }
            }
            if ($cont === 0) {
                echo "No se encontraron vehiculos de la compañia";
            }
        }

        public function rotores($numeroRotores): void
        {
            $cont = 0;
            foreach ($this->elementosVolador as $elemento) {
                if ($elemento instanceof Helicoptero) {
                    if ($elemento->getRotores() === $numeroRotores) {
                        echo $elemento->mostrarInformacion();
                        $cont++;
                    }
                }
                if ($cont === 0) {
                    echo "No se encontraron helicopteros";
                }
            }
        }
        // con el ? decimos que puede ser elemento volador o no lo que nos retornara
        public function despegar($nombre, $altitudEsperada, $velocidad): ?ElementoVolador
        {
            foreach ($this->elementosVolador as $elemento) {
                if ($elemento->getNombre() === $nombre) {
                    // Acelerar a la velocidad indicada
                    $elemento->acelerar($velocidad);
                    echo "Acelerando " . $elemento->getNombre() . " a " . $velocidad . " km/h.<br>";

                    // Hacer que el objeto vuele a la altitud deseada
                    $elemento->volar($altitudEsperada);

                    // Devolver el objeto después de haber despegado
                    return $elemento;
                }
            }

            // Si no se encontró el elemento, se devuelve null
            echo "No se encontró el vehículo con nombre: " . $nombre . ".<br>";
            return null;
        }
    }

    ?>
</body>

</html>