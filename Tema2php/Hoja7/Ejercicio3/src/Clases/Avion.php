<?php
namespace App\Clases;
 class Avion extends ElementoVolador
 {
     private string $companiaAerea;
     private \DateTime $fechaAlta;
     private float $altitudMaxima;

     public function __construct(string $nombre, int $numAlas, int $numMotores, float $altitud, string $companiaAerea, int $velocidad, \DateTime $fechaAlta, float $altitudMaxima)
     {
         parent::__construct($nombre, $numAlas, $numMotores, $altitud, $velocidad);
         $this->fechaAlta = $fechaAlta;
         $this->altitudMaxima = $altitudMaxima;
         $this->companiaAerea = $companiaAerea;
     }


     public function volar(float $altitudDeseada): void
     {
         if ($altitudDeseada > 0 && $this->altitudMaxima>=$altitudDeseada) {
             if ($this->__get('velocidad') >= 150) {
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
?>