<?php

				require_once("connection.php");
               require_once ("recursos.php");
			   
               session_start();
$id=$_SESSION['session_username'];	   
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$telefono=$_POST['telefono'];
$dni=$_POST['dni'];
mysql_query("Update couchinn.usuario set nombre='$nombre', apellido='$apellido', telefono='$telefono', dni='$dni' where email='$id'");
$datos = mysql_query("Select * from usuario where email = '$id'");
$dat = mysql_fetch_array($datos);
?>
</head>
<body>
<div align="center"> <h6><img src="imagenes/logova.png"  width="345" height="88" ></h6> </div> 
<br> " Datos Actualizados Correctamente." <br> 

<div data-role="main" data-theme="a" data-position="fixed" >
<div data-role="controlgroup" data-type="horizontal" >
   <form name="choice" action="intropage.php" target="_top" method="post">
   <input type="submit" value="Volver al menu "  data-icon="back"> </form>

			</div>
	


</div>
<?php include ("footer.php") ; ?>
</body>
</html>