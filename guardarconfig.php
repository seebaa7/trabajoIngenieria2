<?php 
require_once("connection.php");
session_start();

if(!isset($_SESSION["session_username"])) {
echo "<script language='javascript'>window.location='login.php'</script>"; 
} 

$id = $_POST['idbutton'] ;
$value = $_POST['valorinput'] ;



mysql_query("Update couchinn2.parametro set valor='$value' where id='$id'");

echo"<script>alert('Parametro modificado correctamente.');window.location.href=\"preferencias.php\"</script>";


















 ?>