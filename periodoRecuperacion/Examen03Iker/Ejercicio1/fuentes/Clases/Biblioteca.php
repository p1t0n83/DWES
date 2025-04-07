<?php
namespace Ejercicio1\Clases;

use DateTime;
use Ejercicio1\Interfaces\Identificable;

class Biblioteca implements Identificable{
    private string $nombre;
    private $libros=[];
    private $usuarios=[];
    private $prestamos=[];
    
    function __construct($nombre){
        $this->nombre=$nombre;
    }


    function agregarLibro(Libro $libro){
        $this->libros[count($this->libros)]=$libro;
    }

    function agregarUsuario(Usuario $usuario){
        $this->usuarios[count($this->usuarios)]=$usuario;
    }

    function agregarPrestamo(Prestamo $prestamo){
        $this->prestamos[count($this->prestamos)]=$prestamo;
    }

    function buscarUsuarioDni(string $dni){
         $usuarioEncontrado=null;
         foreach($this->usuarios as $usuario){
            if($usuario->getDni()==$dni){
                $usuarioEncontrado=$usuario;
            }
         }
         return $usuarioEncontrado;
    }

    function buscarLibro(string $titulo,string $autor){
        $libroEncontrado=null;
        foreach($this->libros as $libro){
              if($libro->getTitulo()==$titulo && $libro->getAutor()==$autor){
                $libroEncontrado=$libro;
              }
        }
        return $libroEncontrado;
    }


    function prestarLibro(Libro $libro,string $dni){
        $prestado=false;
        $libroEncontrado=$this->buscarLibro($libro->getTitulo(),$libro->getAutor());
        if($libroEncontrado){
            $libroPrestado = false;
            foreach($this->prestamos as $prestamo){
                $libroPrestamo=$prestamo->getLibro();
                if($libroPrestamo->getAutor()==$libro->getAutor() && $libroPrestamo->getTitulo()==$libro->getTitulo() && $prestamo->getFechaDevolucion() === null){
                    $libroPrestado = true;
                }
            }
        $usuarioEncontrado=$this->buscarUsuarioDni($dni);
        if($usuarioEncontrado && !$libroPrestado ){
            $prestamoNuevo=new Prestamo($libro,$usuarioEncontrado,new DateTime());
            $this->prestamos[count($this->prestamos)]=$prestamoNuevo;
            $prestado=true;
        }
    }
    return $prestado;
  }

  function devolverLibro(Libro $libro, string $dni) {
    $devuelto = false;
    $libroEncontrado = $this->buscarLibro($libro->getTitulo(), $libro->getAutor());
    $usuarioEncontrado = $this->buscarUsuarioDni($dni);
    
    if($libroEncontrado != null && $usuarioEncontrado != null) {
        foreach($this->prestamos as $prestamo) {
            $libroPrestamo = $prestamo->getLibro();
            $usuarioPrestamo = $prestamo->getUsuario();
            if($libroPrestamo->getAutor() == $libro->getAutor() && 
               $libroPrestamo->getTitulo() == $libro->getTitulo() &&
               $usuarioPrestamo->getDni() == $dni &&
               $prestamo->getFechaDevolucion() === null) {
                $prestamo->setFechaDevolucion(new DateTime());
                $devuelto = true;
                break;
            }
        }
    }
    return $devuelto;
}

  function listarElectronicos($tamanoMB){
        $texto="LIBROS ELECTRONICOS CON TAMAÑO MAYOR A ".$tamanoMB."<br>";
        foreach($this->libros as $libro){
            if($libro instanceof LibroElectronico){
                if($libro->getTamanoMB()>$tamanoMB){
                    $texto.=$libro->imprime();
                }
            }
        }
        return $texto;
  }

  function imprime():string{
    $texto="Nombre de la biblioteca ".$this->nombre."<br>"."<br> LIBROS <br>";
    foreach($this->libros as $libro){
        $texto.=$libro->imprime();
    }
    $texto.="<br> USUARIOS <br>";
    foreach($this->usuarios as $usuario){
        $texto.=$usuario->imprime();
    }
    $texto.="<br> PRESTAMOS <br>";
    foreach($this->prestamos as $prestamo){
        $texto.=$prestamo->imprime();
    } 
    return $texto;
  }
}
?>