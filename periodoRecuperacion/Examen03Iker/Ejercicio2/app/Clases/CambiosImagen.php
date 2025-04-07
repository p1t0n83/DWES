<?php
namespace Ejercicio2\Clases;
use Ejercicio2\Interfaces\Redimensionable;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
class CambiosImagen implements Redimensionable{
        

      function redimensionarImagen($alto,$ancho,$ruta){
             $manager=new ImageManager(new Driver());
             $imagen=$manager->read($ruta);
             $imagen->resize($alto,$ancho);
             $imagen->save($ruta);
      }
}

?>