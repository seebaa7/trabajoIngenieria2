<?php 
require_once("connection.php");
session_start();
 
  if(!isset($_SESSION["session_username"])) {
echo "<script language='javascript'>window.location='login.php'</script>"; 
} else { $id=$_SESSION['session_username'];

$datos = mysql_query("Select email from usuario where roll_admin = 1 and email='$id'");
$numrows=mysql_num_rows($datos);


$datos0 = mysql_query( "SELECT * FROM pago WHERE tipo = 2 AND fecha BETWEEN '$_POST[inicio]' AND '$_POST[fin]'" );
	$num = mysql_num_rows($datos0);
$datos3 = mysql_query( "SELECT * FROM pago WHERE tipo = 1 AND fecha BETWEEN '$_POST[inicio]' AND '$_POST[fin]'" );
	$num2 = mysql_num_rows($datos3);

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
            <h3>Reporte de ganancias </h3>
        </div>      </section>
       

      
     <aside class="col-md-3 " >
     <h4 style="color:white">Navegacion</h4>
     <div class="list-group">
              <a href="listadotipos.php" class="list-group-item  " style="background-color:#5e5e5e; color:#FFF"> Listado De Tipos De Hospedajes</a>
              <a href="listadocomodidades.php" class="list-group-item " style="background-color:#5e5e5e; color:#FFF" > Listado De Comodidades</a>
              <a href="finanzas.php" class="list-group-item Active " > Reporte de Ganancias</a>
              <a href="reporteusuarios.php" style="background-color:#5e5e5e; color:#FFF"  class="list-group-item  " > Reporte de Usuarios</a>
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

            <h4 style="color: #FFF">Resumen entre las fechas
            <?php echo $newinicio ?> y <?php echo $newfin ?>
             </h4>
            <br>


    <?php 
if ((isset($_POST['alq'])) & (isset($_POST['prem'])))   {
  if ($num>0 and $num2>0 ) { ?>  <h5 style="color: #FFF" > Se han facturado <?php


	
	$gananciapremium = mysql_query( " SELECT SUM(total) as resul FROM pago WHERE tipo = 2 AND fecha BETWEEN '$_POST[inicio]' AND '$_POST[fin]'" );
	$row = mysql_fetch_array($gananciapremium, MYSQL_ASSOC);
 
	echo $num; ?> membresia/s premium. Generando una ganancia de $
	<?php 
         echo $row["resul"];
	?>

	 </h5>
	 <table  class="table" style="color: #FFF">
                <tr>
                    <th>Email:     </th>
                    <th>Fecha de Pago:     </th>
					<th>Importe Abonado:     </th>
                
                
                </tr>
                <?php while($dat=mysql_fetch_array($datos0)){ ?>
                <tr>
					<td><?php  echo $dat['idu'];?></td>
					<td><?php  echo $dat['fecha'];?></td>
					<td><?php  echo $dat['total'];?></td>
						</form></a></td>
                </tr>
              <?php  }?>
            </table>    <?php   ?>
<br>
<?php

	$gananciahosp = mysql_query( " SELECT SUM(total) as resul FROM pago WHERE tipo = 1 AND fecha BETWEEN '$_POST[inicio]' AND '$_POST[fin]'" );
	$row2 = mysql_fetch_array($gananciahosp, MYSQL_ASSOC);
 
	 ?> <p style="color: #FFF"> Se han reservado  <?php echo $num2 ?> hospedaje/s, generando asi una ganancia a porcentaje de $
	<?php 
         echo $row2["resul"];
	?>. </p>


	 </h5>
	 <br>
	 <table  class="table" style="color: #FFF">
                <tr>
                    <th>Email:     </th>
                    <th>#Hospedaje:     </th>
                    <th>Fecha de Pago:     </th>
					<th>Importe Abonado:     </th>
                
                
                </tr>
                <?php while($dat=mysql_fetch_array($datos3)){ ?>
                <tr>
					<td><?php  echo $dat['idu'];?></td>
					<td><?php  echo $dat['idh'];?></td>
					<td><?php  echo $dat['fecha'];?></td>
					<td><?php  echo $dat['total'];?></td>
						</form></a></td>
                </tr>
              <?php  }?>
            </table> 


	  <?php
	  



   }  else   

  if ($num>0 ) { ?>  <h5 style="color:#FFF"> Se han facturado <?php


	
	$gananciapremium = mysql_query( " SELECT SUM(total) as resul FROM pago WHERE tipo = 2 AND fecha BETWEEN '$_POST[inicio]' AND '$_POST[fin]'" );
	$row = mysql_fetch_array($gananciapremium, MYSQL_ASSOC);
 
	echo $num; ?> membresia/s premium. Generando una ganancia de $
	<?php 
         echo $row["resul"];
	?>

	 </h5>
	 <table  class="table" style="color:#FFF">
                <tr>
                    <th>Email:     </th>
                    <th>Fecha de Pago:     </th>
					<th>Importe Abonado:     </th>
                
                
                </tr>
                <?php while($dat=mysql_fetch_array($datos0)){ ?>
                <tr>
					<td><?php  echo $dat['idu'];?></td>
					<td><?php  echo $dat['fecha'];?></td>
					<td><?php  echo $dat['total'];?></td>
						</form></a></td>
                </tr>
              <?php  }?>
            </table> <br>   <?php 


 echo " <font color='white'>Por otro lado, no se han abonado reservas a hospedajes en la fecha seleccionada </font>" ;

   }  

     else  if ($num2>0 ) { ?>  <h5 style="color:#FFF"> Se ha facturado <?php


	
	$gananciahosp = mysql_query( " SELECT SUM(total) as resul FROM pago WHERE tipo = 1 AND fecha BETWEEN '$_POST[inicio]' AND '$_POST[fin]'" );
	$row2 = mysql_fetch_array($gananciahosp, MYSQL_ASSOC);
 
	 ?><?php echo $num2 ?> reserva/s de hospedaje/s, generando asi una ganancia a porcentaje de $
	<?php 
         echo $row2["resul"];
	?>.


	 </h5>
	 	 <table style="color: #FFF"  class="table">
                <tr>
                    <th>Email:     </th>
                    <th>#Hospedaje:     </th>
                    <th>Fecha de Pago:     </th>
					<th>Importe Abonado:     </th>
                
                
                </tr>
                <?php while($dat=mysql_fetch_array($datos3)){ ?>
                <tr>
					<td><?php  echo $dat['idu'];?></td>
					<td><?php  echo $dat['idh'];?></td>
					<td><?php  echo $dat['fecha'];?></td>
					<td><?php  echo $dat['total'];?></td>
						</form></a></td>
                </tr>
              <?php  }?>
            </table> <br>
   <?php 


 echo "<font color='white'>Por otro lado, no se han realizado pasajes a premium en la fecha seleccionada </font>";

   } else    echo " <font color='white'>En las fechas seleccionadas no se han abonado reservas ni pasajes a premium </font>";}


	else   
		if ((!isset($_POST['alq'])) & (isset($_POST['prem']))){
			if ($num>0)  {
?>  <h5 style="color: #FFF"> Se han facturado <?php


	
	$gananciapremium = mysql_query( " SELECT SUM(total) as resul FROM pago WHERE tipo = 2 AND fecha BETWEEN '$_POST[inicio]' AND '$_POST[fin]'" );
	$row = mysql_fetch_array($gananciapremium, MYSQL_ASSOC);
 
	echo $num; ?> membresia/s premium. Generando una ganancia de $
	<?php 
         echo $row["resul"];
	?>


	 </h5>

 
	 <table class="table" style="color: #FFF">
                <tr>
                    <th>Email:     </th>
                    <th>Fecha de Pago:     </th>
					<th>Importe Abonado:     </th>
                
                
                </tr>
                <?php while($dat=mysql_fetch_array($datos0)){ ?>
                <tr>
					<td><?php  echo $dat['idu'];?></td>
					<td><?php  echo $dat['fecha'];?></td>
					<td><?php  echo $dat['total'];?></td>
						</form></a></td>
                </tr>
              <?php  }?>
            </table>



	  <?php } else echo "<font color='white'>No se han realizado pasajes a premium en la fecha seleccionada </font>";

}
else 

if ((isset($_POST['alq'])) & (!isset($_POST['prem'])))   {
  
 			if ($num2>0)  {
?>  <h5 style="color: #FFF"> Se han realizado <?php


	
	$gananciahosp = mysql_query( " SELECT SUM(total) as resul FROM pago WHERE tipo = 1 AND fecha BETWEEN '$_POST[inicio]' AND '$_POST[fin]'" );
	$row = mysql_fetch_array($gananciahosp, MYSQL_ASSOC);
 
	echo $num2; ?> reserva/s a hospedaje. Generando una ganancia a porcentaje de $
	<?php 
         echo $row["resul"];
	?>


	 </h5>
	 <table  class="table"  style="color: #FFF">
                <tr>
                    <th>Email:     </th>
                    <th>#Hospedaje:     </th>
                    <th>Fecha de Pago:     </th>
					<th>Ganancia Percibida:     </th>
                
                
                </tr>
                <?php while($dat=mysql_fetch_array($datos3)){ ?>
                <tr>
					<td><?php  echo $dat['idu'];?></td>
					<td><?php  echo $dat['idh'];?></td>
					<td><?php  echo $dat['fecha'];?></td>
					<td><?php  echo $dat['total'];?></td>
						</form></a></td>
                </tr>
              <?php  }?>
            </table>



	  <?php }  else echo " <font color='white'> No se han abonado reservas a hospedaje en la fecha seleccionada </font>"; 
} 

else {
  echo"<script>alert('No se ha seleccionado ningun checkbox');window.location.href=\"finanzas.php\"</script>";}


 ?>
</section>

   </section>
   <footer>
      <?php include ("footer.php") ; ?>
        
   </footer>

</body>
</html>








