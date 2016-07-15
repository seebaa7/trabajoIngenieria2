<?php
require_once('connection.php');
               session_start(); 
			   if(!isset($_SESSION["session_username"])) {
 header("location:login.php");
			   }

 $idp = $_GET['id'];
 $respuesta= $_GET['respuesta'];
 mysql_query("UPDATE `preguntas` SET `respuesta`='$respuesta', `contestado` = 1
             WHERE idpregunta='$idp'");

echo"<script>alert('La pregunta se ha respondido correctamente.');window.location.href=\"hospusuario1.php\"</script>";