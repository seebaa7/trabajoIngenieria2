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

$config= mysql_query("Select * from parametro");


if ( ($rol1['roll_admin']==0) ){ header("Location:login.php"); } }

 ?>

<! DOCTYPE HTML>
<html>
<head>

<link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/estilos.css"  />


  <link rel="stylesheet" href="js/jquery-ui.css">
  <script src="js/jquery-1.11.3.min.js"></script>
  <script src="js/jquery-ui.js"></script>
      <!-- jQuery -->

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
            <h3>Preferencias </h3>
        </div>      </section>
       

      
     <aside  class="col-md-3 " >
     <h4 style="color:#FFF">Navegacion</h4>
     <div class="list-group">
              <a href="listadotipos.php" class="list-group-item  " style="background-color:#5e5e5e; color:#FFF"> Listado De Tipos De Hospedajes</a>
              <a href="listadocomodidades.php" class="list-group-item " style="background-color:#5e5e5e; color:#FFF" > Listado De Comodidades</a>
              <a href="finanzas.php" class="list-group-item  " style="background-color:#5e5e5e; color:#FFF"> Reporte de Ganancias</a>
                            <a href="reporteusuarios.php"  style="background-color:#5E5E5E; color:#FFF"  class="list-group-item"> Reporte de Usuarios  </a>  

               <a href="preferencias.php" class="list-group-item Active" > Configuracion General</a>
                         

     </div>
   </aside>
   <section class="col-md-9"> 
   <article>
       <table class="table" style="color: #FFF;">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Valor</th>
            
            </tr>
        </thead>

        <tbody>
<?php while($datis=mysql_fetch_array($config)) { ?>

                 
                
            <tr>
              
                <td><?php  echo $datis['nombre'];?></td>
                <td style="color: #000 " ><form   method="POST"><input name='valorinput' type="number" value="<?php  echo $datis['valor'];?>" > <button  name='idbutton' value="<?php  echo $datis['id'];?>"    formaction="guardarconfig.php"><span class='glyphicon glyphicon-ok'></span></button></form>  </td>

            </tr>
                
  
<?php } ?></tbody> </table>
</article></section>
   </section>
   <footer>
     
             <?php include("footer.php"); ?>

   </footer>

</body>
</html>






