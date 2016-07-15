<?php 
require_once("connection.php");
session_start();
if(!isset($_SESSION["session_username"])) {
echo "<script language='javascript'>window.location='login.php'</script>"; 
} else { $id=$_SESSION['session_username'];
$dt= mysql_query("Select * from usuario where email = '$id'");

$datos = mysql_query("Select email from usuario where roll_admin = 1 and email='$id'");
$datos22 = mysql_query("Select * from usuario where roll_usuario = 1 and email='$id'");
$roluser= mysql_query ("Select * from usuario where email='$id'");
$roluser1= mysql_fetch_array($roluser);
$rol=mysql_fetch_array($dt);
    if( $rol['roll_admin'] == 1 ) {
        echo "<script language='javascript'>window.location='administrar.php'</script>"; 
    }
    else {


    
     $numrows=mysql_num_rows($datos);
$dt= mysql_query("Select roll_premium from usuario where email = '$id'");
$rol=mysql_fetch_array($dt);
} }?>

<?php 

         
 $idusuario = $_SESSION["session_username"];
 $solicitudes = mysql_query("Select * from solicitar where idu = '$idusuario'");
  $solicitudes1 = mysql_query("Select * from solicitar where idu = '$idusuario'");
  $solicitudes2 = mysql_fetch_array($solicitudes1);

$num = mysql_num_rows($solicitudes);
 ?>

<! DOCTYPE HTML>
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
<body background="imagenes/fondo4.jpg">
  <?php include("header.php"); ?>
   <section class="main container" >

        <section class="jumbotron">

        <div class="container">
            <h3>Reservas Realizadas </h3>
        </div>      </section>
       
<br>
  
<table class="table">
    <thead style="color:white">
        <tr>
            <th>Mensaje</th>
            <th>Hospedaje</th>
            <th>Fecha Inicio</th>
            <th>Fecha Fin</th>
            <th>Estado</th>

           
        </tr>
    </thead>
    <tbody style="color:white">
          
                <?php 
  while($sol=mysql_fetch_array($solicitudes)){
              
    $fechainicio=strtotime($sol['fechainicio']);
    $newinicio = date('d-m-Y',$fechainicio);
    $fechafin=strtotime($sol['fechafin']);
    $newfin  = date('d-m-Y',$fechafin);
    $img = " SELECT foto FROM imagen WHERE idh = $sol[idh] ";
$resultado= @mysql_query($img) or die(mysql_error());
$datos11 = mysql_fetch_assoc($resultado);
$ruta = "imagenes/" . $datos11['foto'];
    ?>
                  
             <tr>     
            <td><?php echo $sol['mensaje'];?></td>
            <td>           <a  href="detallehosp.php?id=<?php echo $sol['idh'] ?>" > <img width=100px;  src="<?php echo $ruta; ?>"  /> </a>


 </td>
    <td ><?php echo $newinicio;?></td>
        <td ><?php echo $newfin;?></td>

    <td ><?php if ($sol['estado']==0){ echo "En espera";}if ($sol['estado']==1){ echo "Aceptado";}if ($sol['estado']==2){echo "Rechazado";} if($sol['estado']==3){echo "Cancelado";} if($sol['estado']==4){echo "Reservado";}?></td>
    <td><a><form method="get"  target="_top">
        <button formaction="detallehosp.php" style="border:0;background:transparent;outline:none;-webkit-appearance:none" title="Ver detalles del hospedaje reservado"   class="btn" type="submit"  name="id" value=<?php echo $sol['idh']; ?>> <span class="  glyphicon glyphicon-eye-open"></span> </button>
        </a></td>
      <?php if($sol['estado']!=3){ ?>
    <td ><a>
         <input hidden type="text" name="idu" id="idu" value=<?php echo $sol['idu']; ?> >
        <button formaction="cancelar.php" style="border:0;background:transparent;outline:none;-webkit-appearance:none" title="Cancelar solicitud"  class="btn" type="submit"  name="id" value=<?php echo $sol['idh']; ?>> <span class="  glyphicon glyphicon-remove"></span>  </button> <?php } ?> 
        </a></td>
        <td ><a>
           
          <?php if ($sol['estado']==1){ ?> <input hidden type="text" name="idu" id="pagar" value=<?php echo $sol['idu']; ?> >
        <button formaction="pagar.php" style="border:0;background:transparent;outline:none;-webkit-appearance:none" title="Confirmar reserva y pagar"  class="btn" type="submit"  name="idh" value=<?php echo $sol['idh']; ?>> <span class="  glyphicon glyphicon-ok"></span>  </button> <?php } ?>
        </form></a></td>

    <?php } ?>
    
                </tr>
    </tbody>
</table>





 
   </section>

 <br>
   <footer>
            <?php include("footer.php"); ?>

        
   </footer>

</body>
</html>




  
 
