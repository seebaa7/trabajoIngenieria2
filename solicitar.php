<?php 
require_once('connection.php');
               session_start(); 
			   if(!isset($_SESSION["session_username"])) {
 header("location:login.php");
			   }
 $idusuario = $_SESSION["session_username"];
 $idh = $_GET['id'];
 ?>
 <html>
  <head>
 <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/estilos.css"  />

      <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

 <link rel="stylesheet" href="js/jquery-ui.css">
  <script src="js/jquery-1.11.3.min.js"></script>
  <script src="js/jquery-ui.js"></script>


  <script>

{  $(function() {
    $("#dateinicio").datepicker({
    dateFormat: 'yy/mm/dd',
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: '2016:2050',
    minDate: 1,
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
 <body>
 <body background="imagenes/fondo4.jpg">
  <?php include("header.php"); ?>
   <section class="main container" >


        <div class="container">
        <br><br>
 <form  action="solicitar1.php" method="post">
 <p style="color: white">Ingrese un mensaje para el dueño del hospedaje:</p><
 <input type="text" name="mensaje" id ="mensaje" size=150>
 <br>
 <br>
  <p style="color: #FFF;">Seleccione el rango de fechas en el cual desea reservar </p>
          


          <p style="color:white">Desde: <input style="color: #000 " required name="inicio" type="text" id="dateinicio"> <span style="color:lightblue" class='glyphicon glyphicon-calendar'></span> </p>

          <p style="color:white">Hasta : <input style="color: #000 " required name="fin" type="text" id="datefinal"> <span style="color:lightblue"  class='glyphicon glyphicon-calendar'></span></p>

        <br>

          <p style="color: #000 ">   <button name="buton" type="submit" value="<?php echo $idh; ?>"> Enviar Solicitud </button>  </p>

      </form>

 
 </div>
 <footer>
             <?php include("footer.php"); ?>

        
   </footer>
  </body>
  </html>