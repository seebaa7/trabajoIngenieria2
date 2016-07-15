<?php

      
             
              require_once("connection.php");
               
               session_start(); 
			    if(!isset($_SESSION['session_username'])){
		header("location: login.php");
	}
         
      
			   
			   
              	
               $idt = $_GET['id'];
			   $datos = mysql_query("Select nombre,idt from tipo where idt = '$idt'");
			   $dat16 = mysql_fetch_array($datos);
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
            <h3>Modificar Tipo de Hospedaje </h3>
        </div>      </section>
       
        
      
     <aside class="col-md-3 hidden-xs hidden-sm" >
     <h4 style="color:#FFF">Navegacion</h4>
     <div class="list-group">
              <a href="listadotipos.php"  style="background-color:#5E5E5E; color:#FFF; "   class="list-group-item  " > Listado De Tipos De Hospedajes</a>
              <a href="listadocomodidades.php" style="background-color:#5E5E5E; color:#FFF"  class="list-group-item  " > Listado De Comodidades</a>
              <a href="finanzas.php"  style="background-color:#5E5E5E; color:#FFF" class="list-group-item  " > Reporte de Ganancias</a>
              <a href="reporteusuarios.php"  style="background-color:#5E5E5E; color:#FFF"  class="list-group-item"> Reporte de Usuarios  </a>  
              <a href="preferencias.php" style="background-color:#5E5E5E; color:#FFF"   class="list-group-item  " > Configuracion General</a>

     </div>
   </aside>


               <br>
			   <form method="post" action="modificartipo.php" > 
                 <p style="color: white">Ingrese el nuevo nombre del tipo: </p>
				 <input type="text" name="nombre" value="<?php echo $dat16['nombre']; ?>" >
                 <button type="submit"  name="id" value=<?php echo $dat16['idt']; ?>>Modificar</button>
            </form>
 
   </section>

 
   <footer>
        <?php include("footer.php") ; ?>

        
   </footer>

</body>
</html>