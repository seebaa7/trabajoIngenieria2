<?php

	
             require_once("connection.php");
               session_start(); 
			   
      
			   
			   
               $idtipo = $_POST['id'];
			   $nombre = $_POST['nombre'];
			   $datos =mysql_query("Select * from tipo where nombre= '$nombre' AND borrado = 1");
		$dat = mysql_num_rows($datos);
		$hospedajes = mysql_query("Select * from hospedaje where idt = '$idtipo'");
		$hosp = mysql_num_rows($hospedajes);
		if($hosp==0){
		if($dat != 0){
			mysql_query("Update tipo Set borrado = 0 where nombre = '$nombre' ");
			mysql_query("Update tipo Set borrado = 1 where idt= '$idtipo'");
			echo"<script>alert('El tipo de hospedaje ha sido modificado correctamente.');window.location.href=\"listadotipos.php\"</script>";
		}
		else{
               $num = mysql_query("SELECT nombre FROM tipo WHERE tipo.nombre = '$nombre' AND tipo.borrado = 0 ");
               $ok = mysql_num_rows($num);
               
               if($ok<1){
			   mysql_query("UPDATE couchinn2.tipo SET tipo.nombre = '$nombre'
            WHERE tipo.idt = '$idtipo' " );
            echo"<script>alert('El tipo de hospedaje ha sido modificado correctamente.');window.location.href=\"listadotipos.php\"</script>";			
			   }
			   else{
				   echo"<script>alert('El nombre elegido ya esta en uso.');window.location.href=\"listadotipos.php\"</script>";
			   }

		}
		}
		else{
			echo"<script>alert('El nombre no ha podido ser modificado, hay hospedajes asociados.');window.location.href=\"listadotipos.php\"</script>";
		
		}
		
		
               ?>