<?php

 
               $conexion=mysql_connect("localhost","root","") or 
                       die("Problemas en la conexion");
               require_once ("recursos.php");
               mysql_select_db("couchinn",$conexion)or die("Problemas en la selección de la base de datos");
               
               session_start(); 
			   
      
			   
			   
              	
               $datos=mysql_query("select  nombre,idt from tipo where borrado = 0" ,$conexion) or
                        die("Problemas en el select:".mysql_error());
               ?>
			 
<html> 
<head>
<title></title>
</head>
<body>
 <div data-role = "header" data-theme = "a" data-position = "fixed">
               <form method="get" action="modificartipo.php" > 
                Seleccione el tipo a modificar:<br>
                Tipos:
                 <select name="tipoamodificar" style="width: 100px; margin:8px;" >  
                    <?php while ($dat = mysql_fetch_array($datos)) { ?>
                            <option value ="<?php echo $dat['idt']; ?>"><?php echo $dat['nombre']; ?></option> <?php } ?>							
                 </select>
				 <input type="text" name="nuevonombre" id="nuevonombre" >
                 <input type="submit" value="Modificar" >
            </form>
			</div>
</body>
</html>