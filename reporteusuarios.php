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
        date.setDate(date.getDate() );

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
            <h3>Reporte de Usuarios Registrados </h3>
        </div>      </section>
       

      
     <aside class="col-md-3 " >
     <h4 style="color:#FFF">Navegacion</h4>
     <div class="list-group">
              <a href="listadotipos.php" class="list-group-item  " style="background-color:#5e5e5e; color:#FFF"> Listado De Tipos De Hospedajes</a>
              <a href="listadocomodidades.php" class="list-group-item " style="background-color:#5e5e5e; color:#FFF" > Listado De Comodidades</a>
              <a href="finanzas.php" class="list-group-item" style="background-color:#5e5e5e; color:#FFF" > Reporte de Ganancias</a>
                            <a href="reporteusuarios.php" class="list-group-item Active " > Reporte de Usuarios</a>

               <a href="preferencias.php" class="list-group-item" style="background-color:#5e5e5e; color:#FFF"  > Configuracion General</a>
                         

     </div>
   </aside>
            <h4 style="color: #FFF;">Seleccione el rango de fechas sobre las cuales desea generar el reporte </h4>
            <br>


     <form  action="resultadousuarios.php" method="POST" style="color: #FFF;"> 

          <p>Desde: <input style="color: #000 " required name="inicio" type="text" id="dateinicio"> <span class='glyphicon glyphicon-calendar'></span> </p>

          <p>Hasta : <input style="color: #000 " required name="fin" type="text" id="datefinal"> <span class='glyphicon glyphicon-calendar'></span></p>

     



          <p>   <input style="color: #000 " name="boton" type="submit" value="Consultar">  </p>

      </form>


   </section>
   <footer>
             <?php include("footer.php"); ?>

   </footer>

</body>
</html>



