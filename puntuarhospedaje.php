<?php 
require_once('connection.php');
               session_start(); 
			   if(!isset($_SESSION["session_username"])) {
 header("location:login.php");
			   }
 $idusuario = $_GET['id'];
 ?>
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
 <body>
  <body background="imagenes/fondo4.jpg">
  <?php include("header.php"); ?>
   <section class="main container" style="background: rgba(255,255,255,1);
background: -moz-linear-gradient(left, rgba(255,255,255,1) 0%, rgba(237,237,237,1) 0%, rgba(237,237,237,1) 0%, rgba(237,237,237,1) 100%);
background: -webkit-gradient(left top, right top, color-stop(0%, rgba(255,255,255,1)), color-stop(0%, rgba(237,237,237,1)), color-stop(0%, rgba(237,237,237,1)), color-stop(100%, rgba(237,237,237,1)));
background: -webkit-linear-gradient(left, rgba(255,255,255,1) 0%, rgba(237,237,237,1) 0%, rgba(237,237,237,1) 0%, rgba(237,237,237,1) 100%);
background: -o-linear-gradient(left, rgba(255,255,255,1) 0%, rgba(237,237,237,1) 0%, rgba(237,237,237,1) 0%, rgba(237,237,237,1) 100%);
background: -ms-linear-gradient(left, rgba(255,255,255,1) 0%, rgba(237,237,237,1) 0%, rgba(237,237,237,1) 0%, rgba(237,237,237,1) 100%);
background: linear-gradient(to right, rgba(255,255,255,1) 0%, rgba(237,237,237,1) 0%, rgba(237,237,237,1) 0%, rgba(237,237,237,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#ededed', GradientType=1 );">


        <div class="container">
 Seleccione la puntuación que desea darle al hospedaje en el que se alojó: 
 <br>
 <form action="puntuarhospedaje1.php" method="get">
 <input type="radio" name="radio1" value="1">1
<input type="radio" name="radio1" value="2">2
<input type="radio" name="radio1" value="3">3
<input type="radio" name="radio1" value="4">4
<input type="radio" name="radio1" value="5">5
<button type="submit"  name="id" value=<?php echo $idusuario; ?>>Puntuar</button>
</form>
</div>

<footer>
        <div class="container">
          
          <p  style= " position:relative;   text-align: center;  font-size: 13px; bottom: 0 "  >
          Copyright 2016 CouchInn. Todos los Derechos Reservados. Diseño Web y Programación: Indevelopers   <a href="#contacto.php">Contactenos</a></p>
          
        </div>
        
   </footer>
</body>
</html>