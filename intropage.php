
<!doctype html>

<html>
<head>

	<meta charset="utf-8">
	<title>CouchInn</title>
	<?php
     		 require_once('connection.php');
     		 require_once('recursos.php');
    	?>

</head>
<?php

session_start();
if(!isset($_SESSION["session_username"])) {
 header("location:login.php");
} else {


$id=$_SESSION['session_username'];
		$datos = mysql_query("Select email from usuario where roll_admin = 1 and email='$id'");
		 $numrows=mysql_num_rows($datos);
		
?>

<body >
<div align="center">
	 <h6><img src="imagenes/logova.png" width="345" height="88" ></h6>
     </div>
	<div data-role="header" data-theme="a" data-position="fixed">
			 <?php if ($numrows==1) { ?>	 <form name="admin" action="administrar.php" target="_top" method="post">
   <input type="submit" value="Administrar"  data-icon="gear">
			 </form> <?php }?>
			</div>



  <p>Bienvenido, <span><?php echo  $_SESSION['session_username'];?> </span></p>


<div align="right">
<div id="Bienvenidos">
 <h2>
  <form name="form1" action="logout.php" target="_top" method="post">
   <input type="submit" value="Cerrar Sesion" data-icon="delete" >
   </form>
   <form name="form2" action="index1.php" target="_top" method="post">
   <input type="submit" value="Inicio"  data-icon="home">
   </form>
   
 </h2>
</div>
 
</div> 
<?php
}
?>
	  
	   
	 </h6>
<div align="right"></div>		
	 
<div>
      <ul>
        <li><a href="buscarhospedaje.php">Buscar Hospedaje</a></li>
        <li><a href="ofrecerhospedaje.php">Ofrecer Hospedaje</a></li>
        <?php if ($numrows==0) { ?>	<li><a href="contacto.php">Contactenos</a></li> <?php } ?>
        <?php if ($numrows==0) { ?>		<li><a href="acercadecouchinn.php">Acerca de Couchinn</a></li> <?php } ?>
        <?php if ($numrows==1) { ?>		 <li><a href="agregartipohospedaje.php">AgregarTipoHospedaje</a></li> <?php } ?>
      </ul>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
</div>
<?php 
include("footer.php");
?>
 
</body>
</html>


