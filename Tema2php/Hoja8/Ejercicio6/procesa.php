<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recogiendo los datos con $_POST
    $numero = isset($_POST['numero']) ? intval($_POST['numero']) : null;
   $cadena="TABLA DE MULTIPLICAR DEL ".$numero."<br/>";

   for($i=1;$i<=10;$i++){
    $cadena.=$i.' X '.$numero.' = '.($i*$numero).'<br />';
   }
   echo $cadena;
   echo '<a href="index.html">Volver</a>';

}
    ?>