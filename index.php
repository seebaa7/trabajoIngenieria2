<! DOCTYPE HTML>
<html>
<head>
<?php
session_start();
include("connection.php");             
		?>

	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0,minimum-scale=1.0" />
 	<title > CouchInn </title>
   

</head>
<body background="imagenes/fondo4.jpg">
	<?php include("header.php"); ?>
	 <section class="main container"> 
	 				<section class="jumbotron" >

				<div class="container">
						<h3>Ultimos Hospedajes Agregados </h3>
				</div> 			</section>



<?php include('listadohospedajesindex.php'); ?>

			
	 	
	 </section>

 <footer>
        <div class="container">
          
          <p  style= " position:relative; color: #FFF;   text-align: center;  font-size: 15px; bottom: 0 "  >
          Copyright 2016 CouchInn. Todos los Derechos Reservados. Diseño Web y Programación: Indevelopers   <a href="#contacto.php">Contactenos</a></p>
          
        </div>
        
   </footer>

</body>
</html>
