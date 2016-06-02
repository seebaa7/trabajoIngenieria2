<?php

      
               require_once ("recursos.php");
              require_once("connection.php");
               
               session_start(); 
			    if(!isset($_SESSION['session_username'])){
		header("location: login.php");
	}
         
      
			   
			   
              	
               $datos=mysql_query("select  nombre,idt from tipo where borrado = 0") or
                        die("Problemas en el select:".mysql_error());
               ?>
<html> 
<head>
<title></title>
</head>
<body>
 
				 <div align= "center "  <h6><img src="imagenes/logova.png" width="345" height="88" ></h6> </div>
				<div align="left "> 
	<div data-role="controlgroup" data-type="horizontal" >
	<form  name="choice" action="intropage.php" target="_top" method="post">
   <input type="submit" value="Volver Al Menu Anterior"  data-icon="back"> </form> </div> </div>
               <ul>
        <li><a href="listadohospedajes.php">Listado De Hospedajes </a></li>
		<li><a href="altahosp.php" > Subir Hospedaje  </a></li>
        <li><a href="ofrecerhospedaje.php">Ofrecer Hospedaje</a></li>
        <li><a href="Agregartipohospedaje.php"> Agregar Tipo De Hospedaje</a></li>
		<li><a href="moditipo.php"> Modificar Tipo De Hospedaje</a></li>
		<li><a href="borratipo.php"> Borrar Tipo De Hospedaje</a></li>
      </ul>
			
<div align="left">			
<?php include ("footer.php") ; ?>			 </div>
</body>

</html>