<?php 
require_once('connection.php');
               session_start(); 
			   if(!isset($_SESSION["session_username"])) {
 header("location:login.php");
			   }
 $idusuario = $_SESSION["session_username"];
 $idh = $_GET['id'];
 $preguntas = mysql_query("Select * from preguntas where idh = '$idh' AND contestado=0");
 
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
   <section class="main container">


        <div class="container">
        <br>
 <?php 
 $num = mysql_num_rows($preguntas);
 if($num>0){ ?>
<form action="contestarpreguntas2.php" method="get">
  <table class="table" style="color:white";>
  <tr>
  <th> Pregunta:</th>
  </tr>
  <?php while($pregunta=mysql_fetch_array($preguntas)){ ?>
  <tr>
  <td><?php echo $pregunta['pregunta']; ?></td>
  <?php $idpreg=$pregunta['idpregunta']; ?>
  <td><a><form method="get" action="contestarpreguntas2.php" target="_top">
				<button class="btn btn-success" type="submit"  name="id" value=<?php echo $idpreg; ?>>Responder</button>
				</form></a></td>
				</tr>
  <?php } ?>
				</table>
 <?php } 
   else{
	    echo"<script>alert('No hay preguntas en el hospedaje seleccionado.');window.location.href=\"hospusuario1.php\"</script>";
   } ?>
   </div>
   <footer>
       <?php include("footer.php"); ?>
        
   </footer>
  </body>
  </html>