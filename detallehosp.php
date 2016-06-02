<?php
$conexion=mysql_connect("localhost","root","") or 
                       die("Problemas en la conexion");

               mysql_select_db("couchinn",$conexion)or die("Problemas en la selección de la base de datos");
               require_once ("recursos.php");
               session_start(); 
$id = $_GET['id'];
$datos = mysql_query("Select * from hospedaje Where idh = '$id' ", $conexion);
?>
<html>
 <head>
        <title></title>
    </head>
    <body>
	<div data-role = "header" data-theme = "a" data-position = "fixed">
	<?php
	while($dat=mysql_fetch_array($datos)){
		        echo "Pais: "; echo $dat['idp']; ?> <br> <?php
				echo "Provincia:"; echo $dat['provincia']; ?> <br> <?php
				echo "Ciudad: "; echo $dat['ciudad']; ?> <br> <?php
				echo "Calle: "; echo $dat['calle']; ?> <br> <?php
				echo "Numero: "; echo $dat['numero']; ?> <br> <?php
				echo "Piso: "; echo $dat['piso']; ?> <br> <?php
				echo "Precio: "; echo $dat['precio']; ?> <br> <?php
				?>
				<br>
				<?php
			}
	?>
	</form>
	</body>
	</html>