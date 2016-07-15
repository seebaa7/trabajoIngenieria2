

<?php

			   require_once('connection.php'); 
			   if(!isset($_SESSION["session_username"])) {
					 header("location:login.php");
					 }
$idusuario = $_SESSION["session_username"];
$datos=mysql_query("Select * from hospedaje where idu = '$idusuario' and borrado=0");
$numrows=mysql_num_rows($datos);


?>





 
                <?php
				
		if( $numrows == 0 ) { ?> 
			<h3 style="color:#FEFEFE" > <?php echo " Usted no posee hospedajes publicados " ;?> </h3>
			<?php } 
			else { ?> 
        <table class="table">
        <thead style="color:white">
            <tr>
                <th>Provincia</th>
                <th>Ciudad</th>
                <th>Direccion</th>
                <th>Precio</th>
                <th>Hospedaje</th>
            </tr>
        </thead>

        <tbody  >
         <?php while($dat=mysql_fetch_array($datos)){ $provincia= mysql_query ("Select nombre from provincia where idp= '$dat[idp]'");
$provincia1=mysql_fetch_array($provincia);

$img = " SELECT foto FROM imagen WHERE idh = $dat[idh] ";
$resultado= @mysql_query($img) or die(mysql_error());
$datos11 = mysql_fetch_assoc($resultado);
$ruta = "imagenes/" . $datos11['foto'];

?>                
                
            <tr style="color:white">
                <td><?php  echo $provincia1['nombre'];?></td>
                <td><?php  echo $dat['ciudad'];?></td>
                <td><?php  echo $dat['direccion'];?></td>
                <td><?php  echo $dat['precio'];?> $</td>
<td> <a  href="detallehosp.php?id=<?php echo $dat['idh'] ?>" > <img width=100px;  src="<?php echo $ruta; ?>"  /> </a></td>

                 <td><div style="color:lightblue" id="botones" > <form method="get"  target="_top">
        <button formaction="detallehosp.php" class="btn"  style="border:0;background:transparent;outline:none;-webkit-appearance:none" title="Vista Previa"   type="submit" name="id" value=<?php echo $dat['idh']; ?>><span class="glyphicon glyphicon-search"></span> </button>
       
               <button formaction="versolicitudhospedaje.php" class="btn"  style="border:0;background:transparent;outline:none;-webkit-appearance:none" title="Ver Reservas Solicitadas"   type="submit"   name="id" value=<?php echo $dat['idh']; ?>> <span class="  glyphicon glyphicon-eye-open"></span>  </button>
               
                  <button formaction="contestarpreguntas.php" class="btn"  style="border:0;background:transparent;outline:none;-webkit-appearance:none" title="Ver Preguntas Recibidas"   type="submit"   name="id" value=<?php echo $dat['idh']; ?>><span class="glyphicon glyphicon-envelope"></span> </button>
                  <button formaction="modificarhospedaje.php" class="btn"  style="border:0;background:transparent;outline:none;-webkit-appearance:none" title="Modificar Caracteristicas del Hospedaje"  type="submit"   name="id" value=<?php echo $dat['idh']; ?>><span class="glyphicon glyphicon-pencil"></span>  </button>
                   <button formaction="borrarhospedaje.php" class="btn"  style="border:0;background:transparent;outline:none;-webkit-appearance:none" title="Borrar Hospedaje"   type="submit"   name="id" value=<?php echo $dat['idh']; ?>><span class="glyphicon glyphicon-trash"></span>  </button>


                     <button formaction="sumarfotos.php" class="btn"  style="border:0;background:transparent;outline:none;-webkit-appearance:none" title="Subir mas fotos"   type="submit"   name="id" value=<?php echo $dat['idh']; ?>><span class="glyphicon glyphicon-plus"></span>  </button>






                   </form> </div></td>
            </tr>
            <?php  }} ?>
        </tbody>
    </table>

 
  
                	
				
             



