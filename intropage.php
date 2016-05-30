
<!doctype html>

<html>
<head>

	<meta charset="utf-8">
	<title>CouchInn</title>
	<?php
     		 
     		 require_once('recursos.php');
    	?>

</head>

<div align="center">
<body style bgcolor="lightblue">

	 <h6><img src="imagenes/logova.png" width="345" height="88" ></h6>
     </div>
<?php

session_start();
if(!isset($_SESSION["session_username"])) {
 header("location:login.php");
} else {
?>

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
        <li><a href="contacto.php">Contactenos</a></li>
        <li><a href="acercadecouchinn.php">Acerca de Couchinn</a></li>
        <li><a href="agregartipohospedaje.php">AgregarTipoHospedaje</a></li>
      </ul>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
</div>
<div data-role="footer" data-theme="a" data-position="fixed" >
			
			<div data-role="controlgroup" data-type="horizontal" style="text-align:center;">

				  Indevelopers

			</div>
			
            <a href="ayuda/Usuario.pdf" data-icon="alert" style="text-align:left" >Ayuda</a>
            </div>		
</body>
</html>


