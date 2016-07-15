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
$datos = mysql_query("Select * from provincia");

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
            <h3>Resultados de Busqueda por Provincia </h3>
        </div>      </section>
       
       


 <aside class="col-md-3 hidden-xs hidden-sm" >
     <h4 style="color:white">Navegacion</h4>
     <div class="list-group">
              <a href="busquedatipo.php"  style="background-color:#5E5E5E; color:#FFF; "   class="list-group-item  " > Busqueda por Tipo</a>
              <a href="busquedacomodidad.php" style="background-color:#5E5E5E; color:#FFF"  class="list-group-item " >Busqueda por Comodidad</a>
              <a href="busquedapais.php"   style="background-color:#5E5E5E; color:#FFF"   class="list-group-item  " > Busqueda por Pais</a>
              <a href="busquedaprovincia.php"   class="list-group-item active   " > Busqueda por Provincia</a>

     </div>
   </aside>
        
    <!-- end .sidebar1 --></div>
    
  <div class="content"> 
    <div id="cuerpo" style="float:left; padding-left:20px; 	" >

  <?php $idprov = $_GET['idprov'];
$datos = mysql_query("Select * from hospedaje where provincia = '$idprov' and borrado = 0");
$num = mysql_num_rows($datos);
if($num==0){
	echo"<script>alert('No hay hospedajes que cumplan los requisitos seleccionados.');window.location.href=\"busquedaprovincia.php\"</script>";
}		?>
<br>
<table style="color:white" class="table">
  <tr>
  </tr>
  
  <tr>
    <td >Provincia</td>
    <td > Ciudad</td>
    <td >Direccion</td>
    <td >Precio  </td>
        

     

  </tr>

                <?php while($dat=mysql_fetch_array($datos)){ $nombreprovincia = mysql_query ("Select nombre from provincia where idprov = $dat[provincia]  "); $nombreprovincia1 = mysql_fetch_array($nombreprovincia) ?>   
                <tr> 
                 
					<td><?php  echo $nombreprovincia1['nombre'];?></td>
					<td><?php  echo $dat['ciudad'];?></td>
					<td><?php  echo $dat['direccion'];?></td>
					<td><?php  echo $dat['precio'];?> $</td>
                    <td><a><form method="get" action="detallehosp.php" target="_top">
				<button  style="border:0;background:transparent;outline:none;-webkit-appearance:none" title="Detalles del Hospedaje"  id="btn" class="btn" type="submit"  name="id" value=<?php echo $dat['idh']; ?>><span class="glyphicon glyphicon-search"></span> </button>
				</form></a></td>
              
	
                	
		
                </tr>
              <?php  } ?>

</table>





<br>

 
</div>
  </section>
<br>
 
   <footer>
             <?php include("footer.php"); ?>

        
   </footer>

</body>
</html>


 



 



