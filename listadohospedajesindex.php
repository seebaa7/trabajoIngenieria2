<?php



             
			   
$datos = mysql_query("Select idh, provincia, ciudad, direccion, precio from hospedaje");


$sel = "SELECT * FROM hospedaje where borrado=0  ORDER BY idh DESC LIMIT 5 OFFSET 1 ";  
$sel1 = "SELECT * FROM hospedaje where borrado=0  ORDER BY idh DESC LIMIT 1";
$query = mysql_query($sel) or die(mysql_error());
$query1 = mysql_query($sel1) or die(mysql_error());




?>
 <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/estilos.css"  />

   	  <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->

<!-- Carousel container -->
<div id="my-pics" class="carousel slide " data-ride="carousel">

<!-- Indicators -->
<ol class="carousel-indicators" HIDDEN>
<li data-target="#my-pics" data-slide-to="0" class="active"></li>
<li data-target="#my-pics" data-slide-to="1"></li>
<li data-target="#my-pics" data-slide-to="2"></li>
<li data-target="#my-pics" data-slide-to="3"></li>
<li data-target="#my-pics" data-slide-to="4"></li>
<li data-target="#my-pics" data-slide-to="5"></li>
</ol>

<!-- Content -->
<div class="carousel-inner" role="listbox" >

<!-- Slide 1 -->
<?php while($dat1=mysql_fetch_assoc($query1)){  $img = " SELECT foto FROM imagen WHERE idh = $dat1[idh] ";
$resultado1= @mysql_query($img) or die(mysql_error());
$datos2 = mysql_fetch_assoc($resultado1);
$ruta1 = "imagenes/" . $datos2['foto'];
											?>
<div class="item active">
           <a  href="detallehosp.php?id=<?php echo $dat1['idh'] ?>" > <img   src="<?php echo $ruta1; ?>"  /> </a>

 
        </div> <?php } ?>

<?php while($dat=mysql_fetch_assoc($query)){  $nombreprovincia = mysql_query ("Select nombre from provincia where idprov = $dat[provincia]  "); $nombreprovincia1 = mysql_fetch_array($nombreprovincia) ; $img = " SELECT foto FROM imagen WHERE idh = $dat[idh] ";
$resultado= @mysql_query($img) or die(mysql_error());
$aux=$dat['idh'];
$datos1 = mysql_fetch_assoc($resultado);
$ruta = "imagenes/" . $datos1['foto'];


											?>
											<div class="item">
           <a  href="detallehosp.php?id=<?php echo $dat['idh'] ?>" > <img   src="<?php echo $ruta; ?>"  /> </a>
                 
			
			</div> 
 <?php } ?>

</div>

<!-- Previous/Next controls -->
<a class="left carousel-control" href="#my-pics" role="button" data-slide="prev">
<span class="icon-prev" aria-hidden="true"></span>
<span class="sr-only">Previous</span>
</a>
<a class="right carousel-control" href="#my-pics" role="button" data-slide="next">
<span class="icon-next" aria-hidden="true"></span>
<span class="sr-only">Next</span>
</a>

</div>

<!-- Center the image -->
<style scoped>
.item img {
	width:600px;
    margin: 0 auto;
}
</style>