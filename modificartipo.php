<?php

			require_once("footer.php")	;
			require_once("header.php");	
             require_once("connection.php");
               require_once ("recursos.php");
               session_start(); 
			   
      
			   
			   
               $idtipo = $_POST['tipoamodificar'];
			   $nombre = $_POST['nuevonombre'];
               $num = mysql_query("SELECT nombre FROM tipo WHERE tipo.nombre = '$nombre' AND tipo.borrado = 0 ");
               $ok = mysql_num_rows($num);
               
               if($ok<1){
			   mysql_query("UPDATE couchinn.tipo SET tipo.nombre = '$nombre'
            WHERE tipo.idt = '$idtipo' " ); 
			   }
               $datos=mysql_query("select  nombre,idt from tipo where borrado = 0" ) or
                        die("Problemas en el select:".mysql_error());
               ?>
			 
<html> 
<head>
<title></title>
</head>

<body>
        <div align="center"> <h6><img src="imagenes/logova.png"  width="345" height="88" ></h6> </div> 
<br> " El tipo de hospedaje fue modificado correctamente" <br> 

<div data-role="main" data-theme="a" data-position="fixed" >
<div data-role="controlgroup" data-type="horizontal" >
<form name="choice" action="moditipo.php" target="_top" method="post">
   <input type="submit" value="Modificar Otro Hospedaje"  data-icon="refresh"> </form>
   <form name="choice" action="intropage.php" target="_top" method="post">
   <input type="submit" value="Volver al menu "  data-icon="back"> </form>

			</div>
	


</div>       
<div align="left">	 <?php include ("footer.php") ; ?>			 </div>
</body>
</html>