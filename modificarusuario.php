<?php
				require_once("connection.php");
               require_once ("recursos.php");

               session_start(); 
$id = $_SESSION['session_username'];
$datos = mysql_query("Select * from usuario where email = '$id'");
$dat = mysql_fetch_array($datos);
?>
<html>
 <head>
        <title></title>
    </head>
    <body>
	
	<div data-role = "header" data-theme = "a" data-position = "fixed">
	<div align="center"> <h6><img src="imagenes/logova.png"  width="345" height="88" ></h6> </div> 
	<form name="choice" action="intropage.php" target="_top" method="post">
   <input type="submit" value="Volver al menu "  data-icon="back"> </form>
	<form method="post" action="modificarusuario1.php">
	Nombre:
	<input type="text" name="nombre" value="<?php echo $dat['nombre']; ?>" >
	Apellido:
	<input type="text" name="apellido" value="<?php echo $dat['apellido']; ?>" >
	Dni:
	<input type="text" name="dni" value="<?php echo $dat['dni']; ?>" >
	Telefono:
	<input type="text" name="telefono" value="<?php echo $dat['telefono']; ?>" >
	<input type="submit" value="Modificar datos">
	</form>
	<?php include ("footer.php") ; ?>
	</body>
	</html>