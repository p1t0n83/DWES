<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    class Productos
    {
        protected string $codigo;
        protected string $nombre;
        protected float $precio;

        public function __construct(string $codigo, string $nombre, $precio)
        {
            $this->codigo = $codigo;
            $this->nombre = $nombre;
            $this->precio = $precio;
        }
        public function getCodigo()
        {
            return $this->codigo;
        }
        public function getNombre()
        {
            return $this->nombre;
        }
        public function getprecio()
        {
            return $this->precio;
        }
        public function mostrar()
        {
            echo "Codigo de producto: " . $this->codigo . "<br/>" .
                "Nombre: " . $this->nombre . "<br/>" .
                "Precio: " . $this->precio . "<br/>";
        }
    }

    class Alimentacion extends Productos
    {
        private int $mesCaducidad;
        private int $anioCaducidad;
        public function __construct(string $codigo, string $nombre, float $precio, int $mesCaducidad, int $anioCaducidad)
        {
            parent::__construct($codigo, $nombre, $precio);
            $this->mesCaducidad = $mesCaducidad;
            $this->anioCaducidad = $anioCaducidad;
        }

        public function getCaducidad(): string
        {
            return $this->anioCaducidad . "/" . $this->mesCaducidad;
        }

        public function mostrar()
        {
            echo "Codigo de producto: " . $this->codigo . "<br/>" .
                "Nombre: " . $this->nombre . "<br/>" .
                "Precio: " . $this->precio . "<br/>".
                "Fecha de caducidad:". $this->getCaducidad() ."<br/>";
            }
    }

    class Electronica extends Productos
    {

        private int $plazoGarantia;

        public function __construct(string $codigo, string $nombre, float $precio, int $plazoGarantia)
        {
            parent::__construct($codigo, $nombre, $precio);
            $this->plazoGarantia = $plazoGarantia;
        }

        public function getPlazoGarantia():int
        {
        return $this->plazoGarantia;
        }

        public function mostrar()
        {
            echo "Codigo de producto: " . $this->codigo . "<br/>" .
                "Nombre: " . $this->nombre . "<br/>" .
                "Precio: " . $this->precio . "<br/>".
                 "Plazo de garantia: ". $this->getPlazoGarantia(). "<br/>";
            }
    }
    ?>
</body>

</html>