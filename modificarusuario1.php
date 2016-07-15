<?php
 session_start();
				require_once("connection.php");
			  
                  if(!isset($_SESSION["session_username"])) {
	header("Location:login.php");} 
			   
$id=$_SESSION['session_username'];	   
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$telefono=$_POST['telefono'];
$dni=$_POST['dni'];
$clave=$_POST['contraseña'];
mysql_query("Update couchinn2.usuario set nombre='$nombre', apellido='$apellido', telefono='$telefono', dni='$dni', clave='$clave' where email='$id'");

echo"<script>alert('Datos modificados correctamente.');window.location.href=\"modificarusuario.php\"</script>";
?>

	


