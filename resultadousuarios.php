<?php 
require_once("connection.php");
session_start();
 
  if(!isset($_SESSION["session_username"])) {
echo "<script language='javascript'>window.location='login.php'</script>"; 
} else { $id=$_SESSION['session_username'];




$datos10 = mysql_query( "SELECT * FROM usuario WHERE fecha BETWEEN '$_POST[inicio]' AND '$_POST[fin]'" );
	$num = mysql_num_rows($datos10);

$dt= mysql_query("Select roll_premium from usuario where email = '$id'");
$dt1= mysql_query("Select roll_admin from usuario where email = '$id'");
$rol=mysql_fetch_array($dt);
$rol1=mysql_fetch_array($dt1);
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




  <script>

{  $(function() {
    $("#dateinicio").datepicker({
    dateFormat: 'yy/mm/dd',
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: '2016:2050',
    
    onSelect: function(dateText, inst) {
        var date = $.datepicker.parseDate('yy/mm/dd', dateText);
        date.setDate(date.getDate() + 1);

        var $datefinal = $("#datefinal");

        $datefinal.datepicker("option", "minDate", date);            
        


    }
}); })};
 
  $(function() {
    $("#datefinal").datepicker({
    dateFormat: 'yy/mm/dd',
    numberOfMonths: 1,
       changeMonth: true,
    changeYear: true,
    yearRange: '2016:2050'
});
   


   });
  </script>


  <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0,minimum-scale=1.0" />
  <title > CouchInn </title>
   

</head>
<body background="imagenes/fondo4.jpg">
  <?php include("header.php"); ?>
   <section class="main container"> 

        <section class="jumbotron">

        <div class="container">
            <h3>Reporte de usuarios registrados </h3>
        </div>      </section>
       

      
     <aside class="col-md-3 " >
     <h4 style="color:#FFF">Navegacion</h4>
     <div class="list-group">
              <a href="listadotipos.php" class="list-group-item" style="background-color:#5e5e5e; color:#FFF"> Listado De Tipos De Hospedajes</a>

              <a href="listadocomodidades.php" class="list-group-item" style="background-color:#5e5e5e; color:#FFF" > Listado De Comodidades</a>
              <a href="finanzas.php" class="list-group-item" style="background-color:#5e5e5e; color:#FFF"> Reporte de Ganancias </a>
                            <a href="reporteusuarios.php" class="list-group-item Active " > Reporte de Usuarios</a>

               <a href="preferencias.php" class="list-group-item" style="background-color:#5e5e5e; color:#FFF"  > Configuracion General</a>
                         

     </div>
   </aside>
<section class="col-md-9">

<?php 
$fechainicio=strtotime($_POST['inicio']);
$newinicio = date('d-m-Y',$fechainicio);
$fechafin=strtotime($_POST['fin']);
$newfin  = date('d-m-Y',$fechafin);
?>

            <h4 style="color:#FFF">Entre las fechas
            <?php echo $newinicio ?> y <?php echo $newfin ?>:
             </h4>
            
<?php  if ($num>0) {
?> <h4 style="color:#FFF"> Se han registrado  <?php echo $num ?> usuario/s nuevos</h4> 

 <table class="table" style="color:#FFF">
                <tr>
                    <th>Email:     </th>
                    <th>Fecha de registro:     </th>
                                
                
                </tr>
                <?php while($dat=mysql_fetch_array($datos10)){ 
                    $fechafin=strtotime($dat['fecha']);
                    $newfin  = date('d-m-Y',$fechafin);
                  ?>
                <tr>
          <td><?php  echo $dat['email'];?></td>
          <td><?php  echo $newfin;?></td>
          
                </tr>
              <?php  }?>
            </table>  
<?php } else { ?>
<h4 style="color:#FFF"> No se han registrado usuarios nuevos</h4> 

<?php
}

 ?>
 </section>

   </section>
   <footer>
              <?php include("footer.php"); ?>

        
   </footer>

</body>
</html>








