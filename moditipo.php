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
	<form  name="choice" action="administrar.php" target="_top" method="post">
   <input type="submit" value="Volver Al Menu Anterior"  data-icon="back"> </form> </div> </div>
               
			   <form method="post" action="modificartipo.php" > 
                Seleccione el tipo a modificar:<br>
                Tipos:
				
                 
				 <select name="tipoamodificar" >  
                    <?php while ($dat = mysql_fetch_array($datos)) { ?>
                            <option value ="<?php echo $dat['idt']; ?>"><?php echo $dat['nombre']; ?></option> <?php } ?>					
                 </select>
				 <input type="text" name="nuevonombre" id="nuevonombre" >
                 <input type="submit" value="Modificar" >
            </form>
<div align="left">			
<?php include ("footer.php") ; ?>			 </div>
</body>

</html>