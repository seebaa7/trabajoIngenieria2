<?php
require_once('connection.php');
               session_start(); 
			   if(!isset($_SESSION["session_username"])) {
 header("location:login.php");
			   }
$id = $_POST['id'];

	$comodidad = $_POST['com'];
	

	$datos =mysql_query("Select * from hc where idh= '$id' and idc = '$comodidad' AND borrado = 1");
    $dat = mysql_num_rows($datos);
    if($dat != 0){
      mysql_query("Update hc Set borrado = 0 where idc = '$comodidad' and idh = $id ");
      		echo"<script>alert('La comodidad ha sido agregado correctamente.');window.location.href=history.go(-1)</script>";}

 
    
    else {    	
    	$datos2 =mysql_query("Select * from hc where idh = '$id' AND idc ='$comodidad'");
    	$ok = mysql_num_rows($datos2);
		if($ok==0){
		mysql_query(" INSERT INTO hc (hc, idh, idc)
               VALUES (NULL,'$id','$comodidad')");
			   echo"<script>alert('La comodidad ha sido agregado correctamente.');window.location.href=history.go(-1)</script>";}
		else{
		 echo"<script>alert('El hospedaje ya posee dicha comodidad.');window.location.href=history.go(-1)</script>";
		}
		}
		
?>