<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <h1>Elije el grupo de rock</h1>
    <hr>
    <form enctype="multipart/form-data" method="POST">
      <label for="grupo"><select name="grupo">
        <option value="todos" <?php if(isset($_POST['grupo']) && $_POST['grupo']=='todos')echo 'selected';?>>Todos</option>
        <option value="beatles" <?php if(isset($_POST['grupo']) && $_POST['grupo']=='beatles')echo 'selected';?>>The Beatles</option>
        <option value="rolling" <?php if(isset($_POST['grupo']) && $_POST['grupo']=='rolling')echo 'selected';?>>Rolling Stones</option>
        <option value="zeppelin" <?php if(isset($_POST['grupo']) && $_POST['grupo']=='zeppelin')echo 'selected';?>>Led Zeppelin</option>
        <option value="floyd" <?php if(isset($_POST['grupo']) && $_POST['grupo']=='floyd')echo 'selected';?>>Pink Floyd</option>
        <option value="queen" <?php if(isset($_POST['grupo']) && $_POST['grupo']=='queen')echo 'selected';?>>Queen</option>
</select><br></label>
     <button type="submit">Buscar</button>
    </form>

    <?php
     if($_SERVER['REQUEST_METHOD']=='POST'){   
        
    $artistasRock = array(
        "The Beatles" => array(
          "fundacion" => 1960,
          "disolucion" => 1970,
          "discos" => array(
                array("titulo"=>"Please Please Me","anoPublicacion" => 1963,"ruta"=>"imagenes/Please_Please_Me.jpeg"),
                array("titulo"=>"Sgt. Pepper's Lonely Hearts Club Band","anoPublicacion" =>1967,"ruta"=>"imagenes/Sgt_Peppers_Loney_Hearts_Club_Band.jpg"),
                 array("titulo"=>"Abbey Road","anoPublicacion"=>1969,"ruta"=>"imagenes/Abbey_Road.jpeg")
          )
        ),
        "Rolling Stones" => array(
          "fundacion" => 1962,
          "disolucion" => null,
          "discos" => array(
           array("titulo"=> "Out of Our Heads","anoPublicacion" => 1965,"ruta"=>"imagenes/Out_of_Our_Head.jpg"),
            array("titulo"=> "Exile on Main St." ,"anoPublicacion" => 1972,"ruta"=>"imagenes/Exile_on_Main_St.jpg"),
             array("titulo"=> "Some Girls","anoPublicacion" => 1978,"ruta"=>"imagenes/Some_Girls.jpg")
          )
        ),
        "Led Zeppelin" => array(
          "fundacion" => 1968,
          "disolucion" => 1980,
          "discos" => array(
                array("titulo"=>"Led Zeppelin IV","anoPublicacion"=> 1971,"ruta"=>"imagenes/Led_Zeppelin_IV.jpg"),
                array("titulo"=>"Physical Graffiti","anoPublicacion" => 1975,"ruta"=>"imagenes/Physical_Graffiti.jpg"),
                array("titulo"=>"Houses of the Holy","anoPublicacion" => 1973,"ruta"=>"imagenes/Houses_of_the_Holy.jpg")
          )
        ),
        "Pink Floyd" => array(
          "fundacion" => 1965,
          "disolucion" => 2014,
          "discos" => array(
                array("titulo"=>"The Dark Side of the Moon","anoPublicacion" => 1973,"ruta"=>"imagenes/The_Dark_Side_of_the Moon.jpg"),
                array("titulo"=>"Wish You Were Here","anoPublicacion" => 1975,"ruta"=>"imagenes/Wish_You_Were_Here.jpg"),
                array("titulo"=>"The Wall","anoPublicacion" => 1979,"ruta"=>"imagenes/The_Wall.png")
          )
        ),
        "Queen" => array(
          "fundacion" => 1970,
          "disolucion" => 1991,
          "discos" => array(
                array("titulo"=>"A Night at the Opera","anoPublicacion" => 1975,"ruta"=>"imagenes/A_Night_at_the_Opera.jpg"),
                array("titulo"=>"Sheer Heart Attack","anoPublicacion" => 1974,"ruta"=>"imagenes/Sheer_Heart_Attack.jpg"),
                array("titulo"=>"News of the World","anoPublicacion" => 1977,"ruta"=>"imagenes/News_of_the_World.jpg")
          )
        )
      );

            $grupo=$_POST['grupo'];
            $gruposSeleccionados=$artistasRock;
            switch($grupo){
            case "todos":{
             echo "<table class='tabla'>";
             foreach($gruposSeleccionados as $key=>$datos){
                   echo "<tr><th>".$key."</th></tr>";
                   echo "<tr>";
                   foreach($datos['discos'] as $dato){
                        echo "<td>".$dato['titulo']."</td>";   
                        echo "<td><img src='".$dato['ruta']."'></td>";
                   }
                   echo "</tr>";

             }
             echo "</table>";
             break; break;
            }
            case "beatles":{
                echo "<table class='tabla'>";
                foreach($gruposSeleccionados as $key=>$datos){
                     if($key=="The Beatles"){
                      echo "<tr>";
                      foreach($datos['discos'] as $dato){
                           echo "<td>".$dato['titulo']."</td>";   
                           echo "<td><img src='".$dato['ruta']."'></td>";
                      }
                      echo "</tr>";
                    }
                }
                echo "</table>"; break;
            }
            case "rolling":{
                echo "<table class='tabla'>";
                foreach($gruposSeleccionados as $key=>$datos){
                     if($key=="Rolling Stones"){
                      echo "<tr>";
                      foreach($datos['discos'] as $dato){
                           echo "<td>".$dato['titulo']."</td>";   
                           echo "<td><img src='".$dato['ruta']."'></td>";
                      }
                      echo "</tr>";
                    }
                }
                echo "</table>"; break;
            }
            case "zeppelin":{
                echo "<table class='tabla'>";
                foreach($gruposSeleccionados as $key=>$datos){
                     if($key=="Led Zeppelin"){
                      echo "<tr>";
                      foreach($datos['discos'] as $dato){
                           echo "<td>".$dato['titulo']."</td>";   
                           echo "<td><img src='".$dato['ruta']."'></td>";
                      }
                      echo "</tr>";
                    }
                }
                echo "</table>"; break;
            }
            case "floyd":{
                echo "<table class='tabla'>";
                foreach($gruposSeleccionados as $key=>$datos){
                     if($key=="Pink Floyd"){
                      echo "<tr>";
                      foreach($datos['discos'] as $dato){
                           echo "<td>".$dato['titulo']."</td>";   
                           echo "<td><img src='".$dato['ruta']."'></td>";
                      }
                      
                      echo "</tr>";
                    }
                }
                echo "</table>"; break;
            }
            case "queen":{
                echo "<table class='tabla'>";
                foreach($gruposSeleccionados as $key=>$datos){
                     if($key=="Queen"){
                      echo "<tr>";
                      foreach($datos['discos'] as $dato){
                           echo "<td>".$dato['titulo']."</td>";   
                           echo "<td><img src='".$dato['ruta']."'></td>";
                      }
                      echo "</tr>";
                    }
                }
                echo "</table>"; break;
            }
            }
     }

?>      
</body>
</html>