
<?php  /*
            if (isset($_POST['enviar'])) { 
	            $nombre = $_POST['nombre']; 
	            $modulos = $_POST['modulos'];
	            print "Nombre: ".$nombre."<br />"; 
		        foreach ($modulos as $modulo) { print "Modulo: ".$modulo."<br />"; }
            } 
            */
            if (isset($_REQUEST['enviar'])) { 
	            $nombre = $_REQUEST['nombre']; 
	            $modulos = $_REQUEST['modulos'];
	            print "Nombre: ".$nombre."<br />"; 
		        foreach ($modulos as $modulo) { print "Modulo: ".$modulo."<br />"; }
            } 
              
?>