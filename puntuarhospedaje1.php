<?php 
require_once('connection.php');
               session_start(); 
			   if(!isset($_SESSION["session_username"])) {
 header("location:login.php");
			   }
 $idh = $_GET['id'];
 $valor = $_GET['radio1'];
   $idusuario = $_SESSION["session_username"];
 mysql_query("INSERT INTO `puntuacion`(`idp`, `idh`, `Puntuacion`,`puntuador`) VALUES (NULL,'$idh','$valor','$idusuario')");
 			echo"<script>alert('La puntuacion se ha guardado correctamente.');window.location.href=\"solicitudesusuario.php\"</script>";
 ?>