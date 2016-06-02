<?php

 
               $conexion=mysql_connect("localhost","root","") or 
                       die("Problemas en la conexion");

               mysql_select_db("couchinn",$conexion)or die("Problemas en la selección de la base de datos");
               require_once ("recursos.php");
               session_start(); 
			   
      
			   
			   $pais = $_GET['pais'];
			   $calle = $_GET['calle'];
               $ciudad = $_GET['ciudad'];
			   $capacidad = $_GET['capacidad'];
			   $provincia = $_GET['provincia'];
			   $piso = $_GET['piso'];
			   $precio = $_GET['precio'];
			   $tipo = $_GET['tipo'];
			   $numero = $_GET['numero'];
               $idu = $_SESSION['session_username'];
			   mysql_query("INSERT INTO `hospedaje`(`idh`, `idu`, `numero`, `capacidad`, `calle`, `ciudad`, `piso`, `provincia`, `idp`, `idt`, `precio`) VALUES ('','$idu','$numero','$capacidad','$calle','$ciudad','$piso','$provincia','$pais','$tipo','$precio')" , $conexion); 
               $datos=mysql_query("select  nombre,idt from tipo where borrado = 0" ,$conexion) or
                        die("Problemas en el select:".mysql_error());
			  
               ?>	