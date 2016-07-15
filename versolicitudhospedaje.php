<?php 
require_once('connection.php');
               session_start(); 
			   if(!isset($_SESSION["session_username"])) {
 header("location:login.php");
			   }
 $idhosp = $_GET['id'];
 $idusuario = $_SESSION["session_username"];
 $solicitudes = mysql_query("Select * from solicitar where idh = '$idhosp'");
$num = mysql_num_rows($solicitudes);
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
   <section class="main container" >

        
		<div class="container">
 <?php 

 $num = mysql_num_rows($solicitudes);
 if($num==0){ 
 echo"<script>alert('Este hospedaje no tiene solicitudes.');window.location.href=\"hospusuario1.php\"</script>"; 
  }
else{ ?>
	<br>
	<br>
	<table class="table" style="color:white">
	<tr> 
	<th> Mensaje de la solicitud </th>
	<th> Hospedaje </th>
	<th> Fecha Inicio </th>
	<th> Fecha Fin </th>
	<th> Usuario </th>
	<th> Estado </th>
	<th> Puntuar </th>

	</tr>
	<tr>
	<?php
	 $img = " SELECT foto FROM imagen WHERE idh = $idhosp ";
$resultado= @mysql_query($img) or die(mysql_error());
$datos11 = mysql_fetch_assoc($resultado);
$ruta = "imagenes/" . $datos11['foto'];
	while($sol=mysql_fetch_array($solicitudes)){
		$hosp1=$sol['idh'];
		$fechainicio=strtotime($sol['fechainicio']);
		$newinicio = date('d-m-Y',$fechainicio);
		$fechafin=strtotime($sol['fechafin']);
		$newfin  = date('d-m-Y',$fechafin);
		?>

		<td><?php echo $sol['mensaje'];?></td>
		<td> <a  href="detallehosp.php?id=<?php echo $idhosp ?>" > <img width=100px;  src="<?php echo $ruta; ?>"  /> </a></td>
		<td><?php echo $newinicio ;?></td>
		<td><?php echo $newfin;?></td>
		<td><?php echo $sol['idu'];?></td>
		<td ><?php if ($sol['estado']==0){ echo "En espera";}if ($sol['estado']==1){ echo "Aceptado";}if ($sol['estado']==4){echo "Reservado";}if ($sol['estado']==2){echo "Rechazado";} if($sol['estado']==3){echo "Cancelado";}?></td>
		<?php if($sol['estado'] == 0){ ?>
		<td><a><form method="get" action="respuesta.php" target="_top">
		        		<input hidden type="text" name="idu" id="idu" value=<?php echo $sol['idu']; ?> >
						<input hidden type="text" name="id" id="id" value=<?php echo $sol['idh']; ?> >
				<button type="submit"  name="respuesta" value="aceptar">Aceptar</button>
				</form></a>
		<td><a><form method="get" action="respuesta.php" target="_top">
		        		<input hidden type="text" name="idu" id="idu" value=<?php echo $sol['idu']; ?> >
						<input hidden type="text" name="id" id="id" value=<?php echo $sol['idh']; ?> >
				<button type="submit"  name="respuesta" value="rechazar">Rechazar</button>
				</form></a>
		<?php } 
		 $idhosp1 = $sol['idh'];
		 $idusuario11 = $sol['idu'];
		 $puntuacion11 = mysql_query("Select * from puntuacionusuario where idu='$idusuario11' AND puntuador = '$idusuario'");
		 $cant_punt_usuario = mysql_num_rows($puntuacion11); ?>
		<td><?php if(($sol['estado']==4)AND($cant_punt_usuario==0)){ ?>
		         <div class="ec-stars-wrapper">
   
 
 
   <a  href="puntuarusuario2.php?id=<?php echo $idusuario11 ?>&radio1=1"    name="radio1"    title="Votar con 1 estrellas">&#9733;</a>
   <a  href="puntuarusuario2.php?id=<?php echo $idusuario11 ?>&radio1=2"    name="radio1"    title="Votar con 2 estrellas">&#9733;</a>
   <a  href="puntuarusuario2.php?id=<?php echo $idusuario11 ?>&radio1=3"    name="radio1"    title="Votar con 3 estrellas">&#9733;</a>
   <a  href="puntuarusuario2.php?id=<?php echo $idusuario11 ?>&radio1=4"    name="radio1"    title="Votar con 4 estrellas">&#9733;</a>
   <a  href="puntuarusuario2.php?id=<?php echo $idusuario11 ?>&radio1=5"    name="radio1"    title="Votar con 5 estrellas">&#9733;</a>

</div>
		</td> <?php }?>
		</tr>
	<?php	}
} ?>
</table>
<style type="text/css" media="screen">
    .ec-stars-wrapper {
  /* Espacio entre los inline-block (los hijos, los `a`) 
     http://ksesocss.blogspot.com/2012/03/display-inline-block-y-sus-empeno-en.html */
  font-size: 0;
  /* Podríamos quitarlo, 
    pero de esta manera (siempre que no le demos padding), 
    sólo aplicará la regla .ec-stars-wrapper:hover a cuando
    también se esté haciendo hover a alguna estrella */
  display: inline-block;
}
.ec-stars-wrapper a {
  text-decoration: none;
  display: inline-block;
  /* Volver a dar tamaño al texto */
  font-size: 90px;
  font-size: 2.5rem;
  color: #888;
}

.ec-stars-wrapper:hover a {
  color: rgb(39, 130, 228);
}
/*
 * El selector de hijo, es necesario para aumentar la especifidad
 */
.ec-stars-wrapper > a:hover ~ a {
  color: #888;
}
</style>
</div>
<footer>
          <?php include("footer.php"); ?>

   </footer>
  </body>
  </html>