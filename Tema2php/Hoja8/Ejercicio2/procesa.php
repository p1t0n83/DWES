
<?php 
            if (isset($_POST['enviar'])) { 
	            $nombre = $_POST['nombre']; 
	            $modulos = $_POST['modulos'];
	            print "Nombre: ".$nombre."<br />"; 
		        foreach ($modulos as $modulo) { print "Modulo: ".$modulo."<br />"; }
            } 
           /*
            if (isset($_GET['enviar'])) { 
	            $nombre = $_GET['nombre']; 
	            $modulos = $_GET['modulos'];
	            print "Nombre: ".$nombre."<br />"; 
		        foreach ($modulos as $modulo) { print "Modulo: ".$modulo."<br />"; }
            } 
                */
?>