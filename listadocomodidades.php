<?php 
require_once("connection.php");
session_start();
 
  if(!isset($_SESSION["session_username"])) {
echo "<script language='javascript'>window.location='login.php'</script>"; 
} else { $id=$_SESSION['session_username'];
    $datos = mysql_query("Select email from usuario where roll_admin = 1 and email='$id'");
     $numrows=mysql_num_rows($datos);
$dt= mysql_query("Select roll_premium from usuario where email = '$id'");
$dt1= mysql_query("Select roll_admin from usuario where email = '$id'");
$rol=mysql_fetch_array($dt);
$rol1=mysql_fetch_array($dt1);
$datos2 = mysql_query("Select idh, provincia, ciudad, direccion, precio from hospedaje");
if ( ($rol1['roll_admin']==0) ){ header("Location:login.php"); } }

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
   <section class="main container"> 

        <section class="jumbotron">

        <div class="container">
            <h3>Listado de Comodidades </h3>
        </div>      </section>

       
              <?php
    

$datos = mysql_query("Select idt, nombre from tipo where borrado=0");
$datos2 = mysql_query("Select idc, nombre from comodidad where borrado=0");
?>
   <aside class="col-md-3 hidden-xs hidden-sm" >
     <h4 style="color:#FFF">Navegacion</h4>
     <div class="list-group">
              <a href="listadotipos.php" class="list-group-item  " style="background-color:#5E5E5E; color:#FFF" class="list-group-item" > Listado De Tipos De Hospedajes</a>
              <a href="listadocomodidades.php" class="list-group-item active  " > Listado De Comodidades</a>
              <a href="finanzas.php" style="background-color:#5E5E5E; color:#FFF" class="list-group-item  " > Reporte de Ganancias</a>
                            <a href="reporteusuarios.php"  style="background-color:#5E5E5E; color:#FFF"  class="list-group-item"> Reporte de Usuarios  </a>  

              <a href="preferencias.php" style="background-color:#5E5E5E; color:#FFF" class="list-group-item  " > Configuracion General</a>

                            

     </div> 
   </aside>

 <section class="posts col-md-9">
 <br>


<div class="datagrid" id="listadocomodidades" style=" display:inline"  >

<form style="display:inline" name="registerform"  id="registerform" method="post" action="listadocomodidades.php">
<input style="width: 300px" type="text" name="nuevacom"  required="required" placeholder="Ingrese aqui una nueva comodidad" > <button  type="submit" style="border:0;background:transparent;outline:none;-webkit-appearance:none; color:blue"> <span class="glyphicon glyphicon-plus"></span> </button>
</form> </div> 

 

<br><br>
   
<article class="post clearfix">

  
 <div class="datagrid">
 <table id="1" class="table table-bordered table-hover">
<thead>
<tr class="active" >

<th> Comodidades Disponibles :</th></thead>  </th></thead>
 
 <?php while($dat=mysql_fetch_array($datos2)){ ?>
<tbody  style="color:#FFF"><tr><td><?php echo $dat['nombre']?></td><td><a><form method="get" action="modificarcomodidad.php" target="_top">
        <button title="Modificar Tipo" style="border:0;background:transparent;outline:none;-webkit-appearance:none" type="submit"  name="id" value=<?php echo $dat['idc']; ?>> <span class="glyphicon glyphicon-pencil"></span> </button>
        </form></a></td><td><a><form method="get" action="borrarcomodidad.php" target="_top">
        <button title="Borrar Tipo" style="border:0;background:transparent;outline:none;-webkit-appearance:none" type="submit"  name="id"  value=<?php echo $dat['idc']; ?>><span class="glyphicon glyphicon-trash"></span> </button>
        </form></a></td></tr>
                

</tbody>
  <?php  }?>
</table></div>
<script>
$(document).ready(function(){
    $("#id1").click(function(){
        $("#listadocomodidades").fadeToggle();
      
    }); }); </script>
<div id="agregar1" style="display:none" >
<?php 

if(!empty($_POST['nuevacom'])) {
$tipo = $_POST['nuevacom'];
$datos =mysql_query("Select * from comodidad where nombre= '$tipo' AND borrado = 1");
    $dat = mysql_num_rows($datos);
    if($dat != 0){
      mysql_query("Update comodidad Set borrado = 0 where nombre = '$tipo' ");
      echo"<script>alert('La comodidad ha sido agregada correctamente.');window.location.href=\"listadocomodidades.php\"</script>";
    }
    else{
$num = mysql_query("SELECT * FROM comodidad WHERE nombre = '".$tipo."' AND borrado = 0");
$ok = mysql_num_rows($num);
if($ok==0){
  mysql_query(" INSERT INTO couchinn2.comodidad (idc, nombre)
               VALUES (NULL,'$tipo')");
         echo"<script>alert('La comodidad ha sido agregada correctamente.');window.location.href=\"listadocomodidades.php\"</script>";}
  else{
    echo"<script>alert('El nombre seleccionado ya esta en uso.');window.location.href=\"listadocomodidades.php\"</script>";
  }
    } 
       

  
}
?>



</article>
   </section> 

  

      
  



 
   </section>

 
   <footer>
        <?php include("footer.php"); ?>

        
   </footer>

</body>
</html>