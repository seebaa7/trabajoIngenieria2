<html>
 <head>
        <title></title>
    </head><?php

			   require_once('connection.php');
               require_once ("recursos.php");
               session_start(); 
			   if(!isset($_SESSION["session_username"])) {
 header("location:login.php");
}
$datos = mysql_query("Select idh, provincia, ciudad, calle, numero, precio from hospedaje");
?>

    <body>
	<?php include('header.php');?>
	<div align="left "> 
	<div data-role="controlgroup" data-type="horizontal" >
	<form  name="choice" action="intropage.php" target="_top" method="post">
   <input type="submit" value="Volver Al Menu Anterior"  data-icon="back"> </form> </div> </div>
	
	<form method="get" action="detallehosp.php" target="_top">
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
	<div align="left">			
<?php include ("footer.php") ; ?>			 </div>
	</body>
	</html>