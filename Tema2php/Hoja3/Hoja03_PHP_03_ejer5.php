<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $articulos = array(
        array("codigo" => 1, "descripcion" => "Un bote de colacao", "existencias" => 500),
        array("codigo" => 2, "descripcion" => "Una television Samsung", "existencias" => 20),
        array("codigo" => 3, "descripcion" => "Un mando de play", "existencias" => 40)
    );

    function mayor($articulos): String{
       $nombre="";
       $mayorNExistencias="";
       //hacemos un foreach para recorrer el array
       foreach ($articulos as $articulo => $datos) {
        //creo $datos para almacenar el array entero
        //saco lo que quiero poniendo el nombre de la variable
        if($mayorNExistencias<$datos["existencias"]){
            $nombre=$datos["descripcion"];
            $mayorNExistencias=$datos["existencias"];
        }
       }
       return $nombre;
    }
    $mayor=mayor($articulos);
    echo "El articulo con mas existencias es ".$mayor."<br/>";


//funcion para sumar todas las existencias
    function sumar($articulos):int{
      $suma=0;
      foreach ($articulos as $articulo => $datos) {
        $suma+=$datos["existencias"];
      }
      return $suma;
    }

    $suma=sumar($articulos);
    echo "La suma total de todas las existencias es: ".$suma."<br/>";


    function mostrar($articulos):void{
        foreach ($articulos as $articulo => $datos) {
            echo "Codigo:".$datos["codigo"].". Descripcion: ".$datos["descripcion"].". Existencias: ".$datos["existencias"].".<br/>";
        }
    }
    mostrar($articulos);
    ?>
</body>
</html>