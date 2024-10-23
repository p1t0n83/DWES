<?php
// usamos el require para que pille los namespace 
require "../vendor/autoload.php";
//tenemos que utilizar las clases e interfaces, si no usamos el use no funciona
use Ejercicio2\Interfaces\Encendible;
use Ejercicio2\Clases\Coche;
use Ejercicio2\Clases\Bombilla;
//creamos la funcion que nos encendera las cosas
 function enciendoAlgo(Encendible $Encendible){
   $Encendible->encender();
 }
 //no lo pide pero creamos una que las apague
 function apagoAlgo(Encendible $Encendible){
    $Encendible->apagar();
  }
  //instanciamos los coches y las bombillas
 $coche1= new Coche();
 $coche2=new Coche();

 $bombilla1=new Bombilla(0);
 $bombilla2=new Bombilla(8);


//metemos gasolina a los coches
 $coche1->repostar(10);
 $coche2->repostar(5);



//encendemos los coches y las bombillas
 enciendoAlgo($coche1);

 enciendoAlgo($coche2);

 enciendoAlgo($bombilla1);

 enciendoAlgo($bombilla2);

//apagamos los coches

 apagoAlgo($coche1);
 apagoAlgo($coche2);
 apagoAlgo($bombilla1);
 apagoAlgo($bombilla2);
?>