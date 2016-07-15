<?php

	
             require_once("connection.php");
               session_start(); 
			   
      
			   
			   
               $idcom = $_POST['id'];
			   $nombre = $_POST['nombre'];
			   $datos =mysql_query("Select * from comodidad where nombre= '$nombre' AND borrado = 1");
		$dat = mysql_num_rows($datos);
		$hospedajes = mysql_query("Select * from hc where idc = '$idcom'");
		$hosp = mysql_num_rows($hospedajes);
		if($hosp == 0){
		if($dat != 0){
			mysql_query("Update comodidad Set borrado = 0 where nombre = '$nombre' ");
			mysql_query("Update comodidad Set borrado = 1 where idc= '$idcom'");
			echo"<script>alert('La comodidad ha sido modificada correctamente.');window.location.href=\"listadocomodidades.php\"</script>";
		}
		else{
               $num = mysql_query("SELECT nombre FROM comodidad WHERE nombre = '$nombre' AND borrado = 0 ");
               $ok = mysql_num_rows($num);
               
               if($ok<1){
			   mysql_query("UPDATE couchinn2.comodidad SET nombre = '$nombre'
            WHERE idc = '$idcom' " );
            echo"<script>alert('La comodidad ha sido modificada correctamente.');window.location.href=\"listadocomodidades.php\"</script>";			
			   }
			   else{
				   echo"<script>alert('El nombre elegido ya esta en uso.');window.location.href=\"listadocomodidades.php\"</script>";
			   }

		}
		}
		else{
			echo"<script>alert('El nombre no ha podido ser modificado, hay hospedajes asociados.');window.location.href=\"listadocomodidades.php\"</script>";
		
		}
               ?>