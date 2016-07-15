<?php 
require_once("connection.php");
session_start();
 
 
if (isset($_SESSION['session_username'])){ $id=$_SESSION['session_username'];
    $datos24 = mysql_query("Select email from usuario where roll_admin = 1 and email='$id'");
     $numrows=mysql_num_rows($datos24);
$dt= mysql_query("Select roll_premium from usuario where email = '$id'");
$dt1= mysql_query("Select roll_admin from usuario where email = '$id'");
$rol=mysql_fetch_array($dt);
$rol1=mysql_fetch_array($dt1);
$datos21 = mysql_query("Select idh, provincia, ciudad, direccion, precio from hospedaje");
$datos45 = mysql_query("Select * from tipo where borrado = 0");
}
 ?>

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
            <h3>Busqueda por  Tipo de Hospedaje</h3>
        </div>      </section>
       
       


 <aside class="col-md-3 hidden-xs hidden-sm" >
     <h4 style="color:white">Navegacion</h4>
     <div class="list-group">
              <a href="busquedatipo.php"    class="list-group-item active  " > Busqueda por Tipo</a>
              <a href="busquedacomodidad.php" style="background-color:#5E5E5E; color:#FFF"  class="list-group-item  " >Busqueda por Comodidad</a>
              <a href="busquedapais.php"  style="background-color:#5E5E5E; color:#FFF" class="list-group-item  " > Busqueda por Pais</a>
              <a href="busquedaprovincia.php" style="background-color:#5E5E5E; color:#FFF"   class="list-group-item  " > Busqueda por Provincia</a>

     </div>
   </aside>
    


<div class="content" > 
  <div id="cuerpo" style="float:left; padding-left:20px;  " >
  <br>
<p style="color:white">Seleccione el tipo de hospedaje deseado: </p>
<form action="busquedatipo1.php" method="post">
<select name="tipo">
<?php 
while ($dato=mysql_fetch_array($datos45)){ ?>
  <option value=" <?php echo $dato['idt']; ?> "><?php echo $dato['nombre']; ?> </option>
<?php } ?>
</select>

<button class="btn" type="submit" style="border:0;background:transparent;outline:none;-webkit-appearance:none; color:lightblue; title="Buscar Hospedajes De Este Tipo" > <span class="glyphicon glyphicon-search"></span>     </button> 
</form>
<br>
</div>
    

 
   </section>

 <br>

   <footer>
          <?php include("footer.php"); ?>

        
   </footer>

</body>
</html>


  



	
