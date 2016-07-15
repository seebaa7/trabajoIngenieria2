<?php
				require_once("connection.php");

               session_start(); 
			   if(!isset($_SESSION["session_username"])) {
 header("location:login.php");
			   }
$idh = $_GET['id'];
$tipos=mysql_query("select  nombre, idt from tipo where borrado = 0"	)
?>
<html>
 <head>
 <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/estilos.css"  />

      <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>






  <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0,minimum-scale=1.0" />
  <title > CouchInn </title>
 </head>
 <body>
 <body background="imagenes/fondo4.jpg">
  <?php include("header.php"); ?>
  <div class="row">
    
 
   <section class="main container" >
   <section class="jumbotron" >

        <div class="container">
            <h3>Modificar de Hospedaje </h3>
        </div>      </section>
       
        <section class="col-md-4">
        <br>
	<form  method="post" action="modificarhospedaje1.php">
	 <p style="color: white">Pais:</p>
                 <select name="pais" id="pais" >  
                   <?php 
				     $pais=mysql_query("select * from paises");
				   while($dato1= mysql_fetch_array($pais)){?>
                     <option value ="<?php echo $dato1['id']; ?>"><?php echo $dato1['nombre'];?></option> <?php } ?>
                 </select><br><br>
   <p style="color: white">Provincia:</p>
	<select name="provincia" id="provincia" >  
                   <?php 
				     $prov=mysql_query("select * from provincia");
				   while($dato= mysql_fetch_array($prov)){?>
                     <option  value ="<?php echo $dato['idprov']; ?>"><?php echo $dato['nombre'];?></option> <?php } ?>
                 </select><br><br>
				 <?php $datos = mysql_query("Select * from hospedaje where idh = '$idh'");
$dat = mysql_fetch_array($datos); ?>
   <p style="color: white">Ciudad:</p>
                <input type="text" name="ciudad" id="direccion"value="<?php echo $dat['ciudad']; ?>" ><br><br>
   <p style="color: white">Capacidad:</p>
				 <input type="text" name="capacidad" id="capacidad" value="<?php echo $dat['capacidad']; ?>"><br><br>
   <p style="color: white">Direccion:</p>
                <input type="text" name="direccion" id="direccion"value="<?php echo $dat['direccion']; ?>" ><br><br>
   <p style="color: white">Precio:</p>
                <input type="double" name="precio" id="precio" value="<?php echo $dat['precio']; ?>"> <br>  <br>       
   <p style="color: white">Tipo:</p>
      <select name="tipo" id="tipo" >  
                        <?php while($dato= mysql_fetch_array($tipos)){?>
                     <option value ="<?php echo $dato['idt']; ?>"><?php echo $dato['nombre'];?></option> <?php } ?>
                 </select>	
    <button type="submit" name="id" value=<?php echo $dat['idh']; ?>>Modificar</button>				 
	</form>
	</section>
   <section style="color:white" class="col-md-3">
         <br>

         <table  style="color: #FFF" class="table">
        <thead>
              <tr>
              <th>Comodidades</th>             
              </tr> 
        </thead>
        <tbody> 
        <?php
        $d=mysql_query("Select * from hc where idh = $idh and borrado=0");
        while($ddd=mysql_fetch_array($d)){ $idcomm = $ddd['idc'];
          $hss = mysql_query("Select nombre from comodidad where idc = '$idcomm' ");
                    $br = mysql_fetch_array($hss);?> 

                 <tr><td> <?php echo $br['nombre']; ?>
                </td>
                <td> <form  method=post  >
                  <input hidden type="text" name="idh" id="idh" value=<?php echo $dat['idh']; ?> >
                 <button formaction="borrarcomodidadhospedaje.php" style="border:0;background:transparent;outline:none;-webkit-appearance:none" title="Borrar Comodidad"  id="id" name="id" value=<?php echo $idcomm; ?>><span class="glyphicon glyphicon-trash"></span></button>
                  </form>
                  </td>
                </tr> <?php } ?>

        </tbody>
</table> 
      
       <?php

$datos99 = mysql_query("Select * from comodidad"); ?>

<form style="color:black"  action="agregarcom2.php" method="post">
<select name="com">
<?php while($dat34=mysql_fetch_array($datos99)){ ?>
  <option style="color:black" value = "<?php echo $dat34['idc'] ?>" > <?php echo $dat34['nombre'] ?> </option> 
<?php } ?>
 </select>
 <button type="submit" class="glyphicon glyphicon-plus" style="color: blue"  name="id" value=<?php echo $idh; ?>>Agregar</button>
 </form>

 
        </section>

   </div>
 
	<footer>
        <?php include("footer.php"); ?>
   </footer>
	</body>
	</html>