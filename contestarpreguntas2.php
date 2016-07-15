<?php
require_once('connection.php');
               session_start(); 
			   if(!isset($_SESSION["session_username"])) {
 header("location:login.php");
			   }
 $idusuario = $_SESSION["session_username"];
 $idp = $_GET['id'];
 $preguntas = mysql_query("Select * from preguntas where idpregunta='$idp'");
 
 ?>
 
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

   <section class="jumbotron">

        <div class="container">
            <h3>Contestar Preguntas</h3>
        </div>      </section>
   <section class="main container" >


        <div class="container">
 <form action="contestarpreguntas3.php"  method="get">
 <p style="color:white" > Pregunta: </p>
 <?php
 $preg = mysql_fetch_array($preguntas);
   ?>  <p style="color:white" > <?php echo $preg['pregunta'] ?> ;</p>

<br>
 <p style="color:white" > Respuesta: </p>

<input type="text" name="respuesta" size="150">
<br>
<button type="submit" name="id" value=<?php echo $idp; ?>> Contestar </button>
</form>
</div>
  <footer>
     <?php include ("footer.php")?>
        
   </footer>
</body>
</html>