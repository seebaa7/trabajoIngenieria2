
<?php

if(!isset($_SESSION["session_username"])) {
	header("Location:login.php");}

$id = $_GET["id"];
$datos = mysql_query("Select * from comodidad");



?>

<form action="agregarcom2.php" method="get">
<select name="com">
<?php while($dat=mysql_fetch_array($datos)){ 
								?>
	<option value = "<?php echo $dat['idc'] ?>" > <?php echo $dat['nombre'] ?> </option> 
<?php } ?>
 </select>
 <button type="submit"  name="id" value=<?php echo $id; ?>>Agregar</button>
 </form>

 