<?php 
require_once("connection.php");
session_start();
 
  if(!isset($_SESSION["session_username"])) {
echo "<script language='javascript'>window.location='login.php'</script>"; 
} else { $id=$_SESSION['session_username'];
    $datos = mysql_query("Select email from usuario where roll_admin = 1 and email='$id'");
     $numrows=mysql_num_rows($datos);
$dt= mysql_query("Select roll_premium from usuario where email = '$id'");
$dt1= mysql_query("Select * from usuario where email = '$id'");
$rol=mysql_fetch_array($dt);
$rol1=mysql_fetch_array($dt1);
$datos2 = mysql_query("Select idh, provincia, ciudad, direccion, precio from hospedaje");

       
}?>
 

<! DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/estilos.css"  />

      <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>






  <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0,minimum-scale=1.0" />
  <title > CouchInn </title>
   

</head>
<body background="imagenes/fondo4.jpg">
  <?php include("header.php"); ?>
   <section class="main container" >
     
   </style>

        <section class="jumbotron">

        <div class="container">
            <h3>Buscar Tipo de Hospedaje</h3>
        </div>      </section>
       
       


 <aside class="col-md-3 hidden-xs hidden-sm" >
     <h4 style="color:white">Navegacion</h4>
     <div class="list-group">
              <a href="busquedatipo.php"  style="background-color:#5E5E5E; color:#FFF; "   class="list-group-item  " > Busqueda por Tipo</a>
              <a href="busquedacomodidad.php" style="background-color:#5E5E5E; color:#FFF"  class="list-group-item  " >Busqueda por Comodidad</a>
              <a href="busquedapais.php"  style="background-color:#5E5E5E; color:#FFF" class="list-group-item  " > Busqueda por Pais</a>
              <a href="busquedaprovincia.php" style="background-color:#5E5E5E; color:#FFF"   class="list-group-item  " > Busqueda por Provincia</a>

     </div>
   </aside>
    



    

 
   </section>
<br>
 
   <footer>
          <?php include("footer.php"); ?>

        
   </footer>

</body>
</html>







 


			 

	
	




   
