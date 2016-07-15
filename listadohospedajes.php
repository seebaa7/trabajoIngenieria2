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
   <section class="main container" background="imagenes/fondo4.jpg">
     
   </style>

        <section class="jumbotron">

        <div class="container">
            <h3>Hospedajes Disponibles </h3>
        </div>      </section>
       
       



        
  
    <section class="col-md-9">
      
   
  <div class="content"> 
<?php


             
			   
$datos = mysql_query("Select idh, provincia, ciudad, direccion, precio from hospedaje where borrado=0");

?>

<br>

<table  style="color: #FFF; margin-left: 140px " class="table">
<thead><tr><th>Provincia</th><th> Ciudad</th><th>Direccion</th><th>Precio</th><th>Hospedaje</th><th>Detalles</th></tr> </thead>
        <?php while($dat=mysql_fetch_array($datos)){
             $img = " SELECT foto FROM imagen WHERE idh = $dat[idh] ";
$resultado= @mysql_query($img) or die(mysql_error());
$datos11 = mysql_fetch_assoc($resultado);
$ruta = "imagenes/" . $datos11['foto'];
         $nombreprovincia = mysql_query ("Select nombre from provincia where idprov = $dat[provincia]  "); $nombreprovincia1 = mysql_fetch_array($nombreprovincia) ?> 


<tbody> 
<tr><td> <?php  echo $nombreprovincia1 ['nombre'];?></td><td> <?php  echo $dat['ciudad'];?></td><td><?php  echo $dat['direccion'];?></td><td>$ <?php  echo $dat['precio'];?></td>
<td> <a  href="detallehosp.php?id=<?php echo $dat['idh'] ?>" > <img width=100px;  src="<?php echo $ruta; ?>"  /> </a></td>
<td><a><form action="detallehosp.php" name="id" id="id" method="get" >
				<button style="border:0;background:transparent;outline:none;-webkit-appearance:none" title="Detalles del Hospedaje"  id="id" name="id" value=<?php echo $dat['idh']; ?>><span class="glyphicon glyphicon-search"></span></button>
				</form></a></td></tr>
</tbody><?php  }?>
</table> 
</div>
 </section>
  </section>

 
   <footer>
    <?php include("footer.php") ; ?>
        
   </footer>

</body>
</html>


	