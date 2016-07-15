<?php 
require_once('connection.php');
               session_start(); 
			   if(!isset($_SESSION["session_username"])) {
 header("location:login.php");
			   }
 $idh = $_GET['id'];
 $idu = $_GET['idu'];
 
 mysql_query("Update solicitar set pago=0, estado=3 where idh='$idh' and idu='$idu'");
 
 echo"<script>alert('La solicitud ha sido cancelada.');window.location.href=\"solicitudesusuario.php\"</script>";
 
?> 