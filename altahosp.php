<?php
require_once("connection.php");
			   
session_start();  
               $tipos=mysql_query("select  nombre, idt from tipo where borrado = 0") or
                        die("Problemas en el select:".mysql_error());
               $pais=mysql_query("select nombre from paises") or
                        die("Problemas en el select:".mysql_error());
               $provincia=mysql_query("select nombre from provincia") or
                        die("Problemas en el select:".mysql_error());
						require_once ("recursos.php");
?>
<html>
    <head>
        <title></title>
    </head>
    <body>
	<?php include("header.php") ?> 
	<div align="left ">
	<div data-role="controlgroup" data-type="horizontal" >
	<form  name="choice" action="administrar.php" target="_top" method="post">
   <input type="submit" value="Volver Al Menu Anterior"  data-icon="back"> </form> </div> </div>
   
	<form  method="get" action="altahospedaje.php"> 
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
				 <input type="text" name="numero" id="calle">
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
		<?php include ("footer.php") ; ?>
        </body>
    
</html>