<?php 
require_once('connection.php');
               session_start(); 
			   if(!isset($_SESSION["session_username"])) {
 header("location:login.php");
			   }
 $idh = $_GET['id'];
 $idu = $_GET['idu'];
 $respuesta = $_GET['respuesta'];
 if($respuesta == "aceptar"){
 mysql_query("Update solicitar set pago=1, estado=1 where idh='$idh' and idu='$idu'");
 
 echo"<script>alert('La solicitud ha sido aceptada.');window.location.href=\"hospusuario1.php\"</script>";
 }
 if($respuesta == "rechazar"){
 mysql_query("Update solicitar set pago=0, estado=2 where idh='$idh' and idu='$idu'");
 
 echo"<script>alert('La solicitud ha sido rechazada.');window.location.href=\"hospusuario1.php\"</script>";
 }
?> 
