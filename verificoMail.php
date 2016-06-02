<?php
session_start();
require_once('connection.php');
$correo=$_POST['correo'];
$consultosiExiste="SELECT * FROM usuario WHERE email = '".$correo."'";
$realizo=mysql_query($consultosiExiste);
$existe=mysql_num_rows($realizo);
if($existe>0){
	header("location: login.php?ENVIADO=TRUE");
}
else{
	header("location: olvide.php?NOENVIADO=TRUE");
}
?>
