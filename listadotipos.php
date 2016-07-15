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
            <h3>Listado de Tipos de Hospedajes </h3>
        </div>      </section>
       
              <?php
    

$datos = mysql_query("Select idt, nombre from tipo where borrado=0");
$datos2 = mysql_query("Select idc, nombre from comodidad where borrado=0");
?>
   <aside class="col-md-3 hidden-xs hidden-sm" >
     <h4 style="color:#FFF">Navegacion</h4>
     <div class="list-group">
              <a href="listadotipos.php" class="list-group-item active " > Listado De Tipos De Hospedajes</a>
              <a href="listadocomodidades.php" class="list-group-item   " style="background-color:#5E5E5E; color:#FFF""> Listado De Comodidades</a>
              <a href="finanzas.php" style="background-color:#5E5E5E; color:#FFF" class="list-group-item  " > Reporte de Ganancias</a>
                            <a href="reporteusuarios.php"  style="background-color:#5E5E5E; color:#FFF"  class="list-group-item"> Reporte de Usuarios  </a>  

              <a href="preferencias.php" style="background-color:#5E5E5E; color:#FFF" class="list-group-item  " > Configuracion General</a>

                            

     </div> 
   </aside>

 <section class="posts col-md-9">
 <br>

</div> <div class="datagrid" id="listadotipos" style="display:inline" >

<form name="registerform"  id="registerform" method="post" action="listadotipos.php">
<input style="width: 300px" type="text" name="nuevotipo"  required="required" placeholder="Ingrese un nuevo tipo de hospedaje" > <button  style="border:0;background:transparent;outline:none;-webkit-appearance:none"  type="submit" > <span style="color:blue" class="glyphicon glyphicon-ok"></span>  </button>
</form> </div>
   
<article class="post clearfix">

  
 <div class="datagrid">
 <table class="table table-bordered ">
<thead>
<tr class="active">

<th> Tipos Disponibles :</th></thead>
 <?php while($dat=mysql_fetch_array($datos)){ ?>
<tbody  style="color:#FFF"><tr><td><?php echo $dat['nombre']?></td><td><a><form method="get" action="moditipo.php" target="_top">
        <button title="Modificar Tipo" style="border:0;background:transparent;outline:none;-webkit-appearance:none" type="submit"  name="id" value=<?php echo $dat['idt']; ?>> <span class="glyphicon glyphicon-pencil"></span> </button>
        </form></a></td><td><a><form method="get" action="borrartipo.php" target="_top">
        <button title="Borrar Tipo" style="border:0;background:transparent;outline:none;-webkit-appearance:none" type="submit"  name="id"  value=<?php echo $dat['idt']; ?>><span class="glyphicon glyphicon-trash"></span> </button>
        </form></a></td></tr>
                

</tbody>
  <?php  }?>
</table></div>

<div id="agregar1" style="display:none" >
<?php 

if(!empty($_POST['nuevotipo'])) {
$tipo = $_POST['nuevotipo'];
$datos =mysql_query("Select * from tipo where nombre= '$tipo' AND borrado = 1");
    $dat = mysql_num_rows($datos);
    if($dat != 0){
      mysql_query("Update tipo Set borrado = 0 where nombre = '$tipo' ");
      echo"<script>alert('El tipo de hospedaje ha sido agregado correctamente.');window.location.href=\"listadotipos.php\"</script>";
    }
    else{
$num = mysql_query("SELECT * FROM tipo WHERE nombre = '".$tipo."' AND borrado = 0");
$ok = mysql_num_rows($num);
if($ok==0){
  mysql_query(" INSERT INTO couchinn2.tipo (idt, nombre)
               VALUES (NULL,'$tipo')");
         echo"<script>alert('El tipo de hospedaje ha sido agregado correctamente.');window.location.href=\"listadotipos.php\"</script>";}
  else{
    echo"<script>alert('El nombre seleccionado ya esta en uso.');window.location.href=\"listadotipos.php\"</script>";
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



