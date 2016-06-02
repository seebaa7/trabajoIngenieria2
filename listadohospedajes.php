<?php

$conexion=mysql_connect("localhost","root","") or 
                       die("Problemas en la conexion");

               mysql_select_db("couchinn",$conexion)or die("Problemas en la selección de la base de datos");
               require_once ("recursos.php");
               session_start(); 
			   
$datos = mysql_query("Select idh, provincia, ciudad, calle, numero, precio from hospedaje", $conexion);
?>
<html>
 <head>
        <title></title>
    </head>
    <body>
	<div data-role = "header" data-theme = "a" data-position = "fixed">
	<form method="get" action="detallehosp.php">
	<?php
	while($dat=mysql_fetch_array($datos)){
				echo "Provincia:"; echo $dat['provincia']; echo " ";
				echo "Ciudad: "; echo $dat['ciudad']; echo " ";
				echo "Calle: "; echo $dat['calle']; echo " ";
				echo "Numero: "; echo $dat['numero']; echo " ";
				echo "Precio: "; echo $dat['precio']; echo "$";
				?>>
				<button type="submit"  name="id" value=<?php echo $dat['idh']; ?>>Ver detalles</button>
				<br>
				<?php
			}
	?>
	</form>
	</body>
	</html>