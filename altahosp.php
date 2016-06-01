<?php
$conexion=mysql_connect("localhost","root","") or 
                       die("Problemas en la conexion");
mysql_select_db("couchinn",$conexion)or die("Problemas en la selección de la base de datos");
session_start();  
               $tipos=mysql_query("select  nombre, idt from tipo where borrado = 0" ,$conexion) or
                        die("Problemas en el select:".mysql_error());
               $pais=mysql_query("select nombre from paises",$conexion) or
                        die("Problemas en el select:".mysql_error());
               $provincia=mysql_query("select nombre from provincia",$conexion) or
                        die("Problemas en el select:".mysql_error());
						require_once ("recursos.php");
?>
<html>
    <head>
        <title></title>
    </head>
    <body>
	<div data-role = "header" data-theme = "a" data-position = "fixed">
	<form method="get" action="altahospedaje.php"> 
                 Ciudad:
                 <input type="text" name="ciudad" id="ciudad" >
                 Pais:
                 <select name="pais" id="pais" >  
                        <?php while($dato= mysql_fetch_array($pais)){?>
                     <option value ="<?php echo $dato['nombre']; ?>"><?php echo $dato['nombre'];?></option> <?php } ?>
                 </select>
                 Provincia:
                 <select name="provincia" id="provincia" >  
                        <?php while($dato= mysql_fetch_array($provincia)){?>
                     <option value ="<?php echo $dato['nombre']; ?>"><?php echo $dato['nombre'];?></option> <?php } ?>
                 </select> 		
                 Calle:
                 <input  type="text" name="calle" id="calle">
				 Numero:
				 <input type="text" name="numero" id="calle>
				 Capacidad:
				 <input type="text" name="capacidad" id="capacidad">
                Piso(Completar con n/a en caso de que no aplique):
                <input type="text" name="piso" id="piso" >
                Precio:
                <input type="double" name="precio" id="precio" > <br>         
				Tipo:
                 <select name="tipo" id="tipo" >  
                        <?php while($dato= mysql_fetch_array($tipos)){?>
                     <option value ="<?php echo $dato['idt']; ?>"><?php echo $dato['nombre'];?></option> <?php } ?>
                 </select>
				                 <input type="submit" value="Agregar" >
        </form> 
        </div>
        </body>
    
</html>