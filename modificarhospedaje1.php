<?php

				require_once("connection.php");
			   
               session_start();
			   if(!isset($_SESSION["session_username"])) {
 header("location:login.php");
			   }
 $pais = $_POST['pais'];
			   $id = $_POST['id'];
               $ciudad = $_POST['ciudad'];
			   $capacidad = $_POST['capacidad'];
			   $provincia = $_POST['provincia'];
			   $precio = $_POST['precio'];
			   $direccion = $_POST['direccion'];
			   $tipo = $_POST['tipo'];
               $idu = $_SESSION['session_username'];
mysql_query("Update hospedaje set ciudad='$ciudad', capacidad='$capacidad', idp='$pais', provincia='$provincia',
             precio='$precio', direccion='$direccion', idt='$tipo' where idu='$idu' AND idh='$id'");
echo"<script>alert('Datos modificados correctamente.');window.location.href=\"hospusuario.php\"</script>";
?>
