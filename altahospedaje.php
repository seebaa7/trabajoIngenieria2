<html>
<head>
<?php

 
               require_once("connection.php");
               require_once ("recursos.php");
			   
               session_start(); 
			   
      
			   
			   $pais = $_GET['pais'];
			   $calle = $_GET['calle'];
               $ciudad = $_GET['ciudad'];
			   $capacidad = $_GET['capacidad'];
			   $provincia = $_GET['provincia'];
			   $piso = $_GET['piso'];
			   $precio = $_GET['precio'];
			   $tipo = $_GET['tipo'];
			   $numero = $_GET['numero'];
               $idu = $_SESSION['session_username'];
			   mysql_query("INSERT INTO `hospedaje`(`idh`, `idu`, `numero`, `capacidad`, `calle`, `ciudad`, `piso`, 
			   `provincia`, `idp`, `idt`, `precio`) VALUES ('','$idu','$numero','$capacidad','$calle','$ciudad','$piso','$provincia','$pais','$tipo','$precio')"); 
               $datos=mysql_query("select  nombre,idt from tipo where borrado = 0") or
                        die("Problemas en el select:".mysql_error());
			  
               ?>	
</head>
<body>
<div align="center"> <h6><img src="imagenes/logova.png"  width="345" height="88" ></h6> </div> 
<br> " El hospedaje fue agregado correctamente" <br> 

<div data-role="main" data-theme="a" data-position="fixed" >
<div data-role="controlgroup" data-type="horizontal" >
<form name="choice" action="altahosp.php" target="_top" method="post">
   <input type="submit" value="Subir Otro Hospedaje"  data-icon="refresh"> </form>
   <form name="choice" action="intropage.php" target="_top" method="post">
   <input type="submit" value="Volver al menu "  data-icon="back"> </form>

			</div>
	


</div>
<?php include ("footer.php") ; ?>
</body>
</html>
