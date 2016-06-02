<?php

 
              
               
              
               
               session_start(); 
			   
      if(!isset($_SESSION['session_username'])){
  header("location: login.php");}
             require_once("recursos.php");
			require_once("connection.php");
			   
			   
              	
               $datos=mysql_query("select  nombre,idt from tipo where borrado = 0" ) or
                        die("Problemas en el select:".mysql_error());
               ?>
			 
<html> 
<head>
<title></title>
</head>
<body>
             <?php include("header.php"); ?> 
              	<div align="left "> 
	<div data-role="controlgroup" data-type="horizontal" >
	<form  name="choice" action="administrar.php" target="_top" method="post">
   <input type="submit" value="Volver Al Menu Anterior"  data-icon="back"> </form> </div> </div>
               <form method="get" action="borrartipo.php" > 
                Seleccione un tipo<br>
                Tipos:
                 <select name="tipoaborrar"  >  
                    <?php while ($dat = mysql_fetch_array($datos)) { ?>
                            <option value ="<?php echo $dat['idt']; ?>"><?php echo $dat['nombre']; ?></option> <?php } ?>							
                 </select>
                 <input type="submit" value="Eliminar" >
            </form>
			</div>
				<div align="left">			
<?php include ("footer.php") ; ?>			 </div>
</body>
</html>