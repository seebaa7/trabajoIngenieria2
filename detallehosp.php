<?php
				require_once('connection.php');
               require_once ("recursos.php");
               session_start(); 
$id = $_GET['id'];
$datos = mysql_query("Select * from hospedaje Where idh = '$id' ");
?>
<html>
 <head>
        <title></title>
    </head>
    <body>
	<?php include ('header.php'); ?>
		<div align="left "> 
	<div data-role="controlgroup" data-type="horizontal" >
	<form  name="choice" action="listadohospedajes.php" target="_top" method="post">
   <input type="submit" value="Volver Al Menu Anterior"  data-icon="back"> </form> </div> </div>
	<?php while($dat=mysql_fetch_array($datos)){
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
	<div align="left">			
<?php include ("footer.php") ; ?>			 </div>
	</body>
	</html>