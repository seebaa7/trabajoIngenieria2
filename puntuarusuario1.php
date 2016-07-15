<?php 
require_once('connection.php');
               session_start(); 
			   if(!isset($_SESSION["session_username"])) {
 header("location:login.php");
			   }
			    $idus = $_SESSION["session_username"];
 $idhosp = $_GET['id'];
 $idusuario1 = mysql_query("Select idu from hospedaje where idh = '$idhosp'");
 $idusuario2 = mysql_fetch_array($idusuario1);
 $idusuario = $idusuario2['idu'];
 $valor = $_GET['radio1'];
 mysql_query("INSERT INTO `puntuacionusuario`(`idpu`, `idu`, `puntuacion`,`puntuador`) VALUES (NULL,'$idusuario','$valor','$idus')");
 			echo"<script>alert('La puntuacion se ha guardado correctamente.');window.location.href=\"solicitudesusuario.php\"</script>";
 ?>