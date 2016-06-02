
<?php

 
               $conexion=mysql_connect("localhost","root","") or 
                       die("Problemas en la conexion");

               mysql_select_db("couchinn",$conexion)or die("Problemas en la selección de la base de datos");
               
               session_start(); 
			   
      
			   
			   
               $idtipo = $_GET['tipoaborrar'];
               mysql_query("UPDATE couchinn.tipo SET tipo.borrado = 1
            WHERE tipo.idt = $idtipo " , $conexion); 
			   			
               $datos=mysql_query("select  nombre,idt from tipo where borrado = 0" ,$conexion) or
                        die("Problemas en el select:".mysql_error());
               ?>
			 
<html> 
<head>
<title></title>
</head>
<body>
               <div data-role = "header" data-theme = "a" data-position = "fixed">
               <form method="get" action="borrartipo.php" > 
                Seleccione un tipo<br>
                Tipos:
                 <select name="tipoaborrar" style="width: 100px; margin:8px;" >  
                    <?php while ($dat = mysql_fetch_array($datos)) { ?>
                            <option value ="<?php echo $dat['idt']; ?>"><?php echo $dat['nombre']; ?></option> <?php } ?>							
                 </select>
                 <input type="submit" value="Eliminar" >
            </form>
			</div>
</body>
</html>