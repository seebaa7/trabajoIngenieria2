<?php 
require_once('connection.php');
               session_start(); 
			   if(!isset($_SESSION["session_username"])) {
 header("location:login.php");
			   }
			    $idus = $_SESSION["session_username"];
 $idusuario1 = $_GET['id'];
 $valor = $_GET['radio1'];
 mysql_query("INSERT INTO `puntuacionusuario`(`idpu`, `idu`, `puntuacion`,`puntuador`) VALUES (NULL,'$idusuario1','$valor','$idus')");
 			echo"<script>alert('La puntuacion se ha guardado correctamente.');window.location.href=history.go(-1)</script>";
 ?>