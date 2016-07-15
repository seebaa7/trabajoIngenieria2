<?php

      //segmento encargado de la conexion a la base de datos
	  $usuario = "root"; 
	  $bd = "couchinn2";
	  $pass = "";
	  $ruta = "localhost";
	  $con = mysql_connect ($ruta, $usuario, $pass, $bd)or die ("problemas con la coneccion".mysql_error());
	  // selecciono la base de datos 
	  mysql_select_db($bd, $con) or  die("Problemas en la seleccion de la base de datos".mysql_error());


?>