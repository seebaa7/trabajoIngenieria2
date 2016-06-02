<?php

$conexion=mysql_connect("localhost","root","") or 
                       die("Problemas en la conexion");

               mysql_select_db("couchinn",$conexion)or die("Problemas en la selección de la base de datos");
               require_once ("recursos.php");
               session_start();
$id=$_SESSION['session_username'];			   
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$telefono=$_POST['telefono'];
$dni=$_POST['dni'];
mysql_query("Update couchinn.usuario set nombre='$nombre', apellido='$apellido', telefono='$telefono', dni='$dni' where email='Cardinal'", $conexion);
$datos = mysql_query("Select * from usuario where email = '$id'", $conexion);
$dat = mysql_fetch_array($datos);
?>
<html>
 <head>
        <title></title>
    </head>
    <body>
	<div data-role = "header" data-theme = "a" data-position = "fixed">
	<form method="get" action="modificarusuario1.php">
	Nombre:
	<input type="text" name="nombre" value="<?php echo $dat['nombre']; ?>" >
	Apellido:
	<input type="text" name="apellido" value="<?php echo $dat['apellido']; ?>" >
	Dni:
	<input type="text" name="nombre" value="<?php echo $dat['dni']; ?>" >
	Telefono:
	<input type="text" name="nombre" value="<?php echo $dat['telefono']; ?>" >
	<input type="submit" value="Modificar datos">
	</form>
	</body>
	</html>