<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
     require_once "../vendor/autoload.php";
     use Ejercicio1\Interfaces\Identificable;
     use Ejercicio1\Clases\Biblioteca;
     use Ejercicio1\Clases\Libro;
     use Ejercicio1\Clases\LibroElectronico;
     use Ejercicio1\Clases\LibroPapel;
     use Ejercicio1\Clases\Prestamo;
     use Ejercicio1\Clases\Usuario;
  echo "1. -Agregar a la biblioteca los libros y los usuarios <br>";
     $biblioteca=new Biblioteca("BibliotecaDAW214");
     $libroElectronico1=new LibroElectronico("El conde Montecristo","Alejandro Dumas",2.1);
     $usuario1=new Usuario("iker","garcia iturri","72281284N");
     $libroElectronico2=new LibroElectronico("El dia de mañana","Ignacio martinez de Pison",0.5);
     $libroPapel1=new LibroPapel("El vagon de mujeres","Anita Nair",120);
     $usuario2=new Usuario("Maria","Gonzalez","12345678A");
     $usuario3=new Usuario("Ignacio","Alvarez","12345678B");

     $biblioteca->agregarLibro($libroElectronico1);
     $biblioteca->agregarLibro($libroElectronico2);
     $biblioteca->agregarLibro($libroPapel1);
     

     $biblioteca->agregarUsuario($usuario1);
     $biblioteca->agregarUsuario($usuario2);
     $biblioteca->agregarUsuario($usuario3);

     echo $biblioteca->imprime();

     echo "2. Crear prestamos e informar <br>";
     $prestamo1=$biblioteca->prestarLibro($libroElectronico1,$usuario1->getDni());
     echo $prestamo1==true? "Se realizo el prestamo 1 con exito <br>":"No se puedo realizar el prestamo 1 con exito <br>";

     $prestamo2=$libroElectronico4=new LibroElectronico("Donde fuimos invencibles"," Maria Oruña",2.2);
     $biblioteca->prestarLibro($libroElectronico4,$usuario1->getDni());
     echo $prestamo2==true? "Se realizo el prestamo 2 con exito <br>":"No se puedo realizar el prestamo 2 con exito <br>";
     $usuario4=new Usuario("Alfredo"," Gomez","12345679A");
     $prestamo3=$biblioteca->prestarLibro($libroElectronico2,"12345679A");
     echo $prestamo3==true? "Se realizo el prestamo 3 con exito <br>":"No se puedo realizar el prestamo 3 con exito <br>";
     
     $prestamo4=$biblioteca->prestarLibro($libroElectronico1,$usuario2->getDni());
     echo $prestamo4==true? "Se realizo el prestamo 4 con exito <br>":"No se puedo realizar el prestamo 4 con exito <br>";

     $prestamo5=$biblioteca->prestarLibro($libroPapel1,$usuario2->getDni());
     echo $prestamo5==true? "Se realizo el prestamo 5 con exito <br>":"No se puedo realizar el prestamo 5 con exito <br>";


     echo "3. -Crear devoluciones e informar<br>";
     $devolucion1=$biblioteca->devolverLibro($libroElectronico1,$usuario1->getDni());
     echo $devolucion1==true? "Devolucion 1 realizada con exito <br>":"No se puedo realizar la devolucion 1 con exito <br>";


     $devolucion2=$biblioteca->devolverLibro($libroElectronico2,$usuario3->getDni());
     echo $devolucion2==true? "Devolucion 2 realizada con exito <br>":"No se puedo realizar la devolucion 2 con exito <br>";


     echo"<br>4. Mostrar la biblioteca<br>";
     echo $biblioteca->imprime()."<br>";
  
     echo "5. libros electronicos de tamaño superior a 0.4MB<br>";
     echo $biblioteca->listarElectronicos(0.4);
    ?>
</body>
</html>