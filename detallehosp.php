<! DOCTYPE HTML>
<html>
<head>
<?php
session_start();
include("connection.php");    

//Consultas !!!
//

$idhcarrusel = $_GET['id'];
             
         


$sel = "SELECT * FROM imagen where idh = $idhcarrusel  ORDER BY idh DESC LIMIT 4 OFFSET 1 ";  
$sel1 = "SELECT * FROM imagen where idh = $idhcarrusel  ORDER BY idh DESC LIMIT 1";
$query = mysql_query($sel) or die(mysql_error());
$query1 = mysql_query($sel1) or die(mysql_error());
$iduser = $_SESSION["session_username"];      
$id1 = $_GET  ['id'];
$dt15= mysql_query("Select * from usuario where email = '$iduser'");
$rol15=mysql_fetch_array($dt15);
$datos5= mysql_query("Select * from hospedaje Where idh = '$id1' ");
$datos6= mysql_query("Select * from hospedaje Where idh = '$id1' ");
$datos7= mysql_query("Select * from hospedaje Where idh = '$id1' ");

$num=$id1;

$puntaje = mysql_query("Select Puntuacion from puntuacion where idh = '$id1'");



    ?>


  <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0,minimum-scale=1.0" />
  <title > CouchInn </title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/estilos.css"  />

      <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</head>
<body background="imagenes/fondo4.jpg">
  <?php include("header.php"); ?>
   <section class="main container"> 
          <section class="jumbotron" >

        <div class="container">
            <h3>Detalle de Hospedaje </h3>
        </div>      </section>

<section class="row">

<article class="col-md-8">
    

<!-- Carousel container -->
<div id="my-pics" class="carousel slide width:50px" data-ride="carousel">

<!-- Indicators -->
<ol class="carousel-indicators" hidden>
<li hidden data-target="#my-pics" data-slide-to="0" class="active"></li>
<li hidden data-target="#my-pics" data-slide-to="1"></li>
<li hidden data-target="#my-pics" data-slide-to="2"></li>
<li hidden data-target="#my-pics" data-slide-to="3"></li>
<li hidden data-target="#my-pics" data-slide-to="4"></li>
</ol>

<!-- Content -->
<div class="carousel-inner" role="listbox">

<!-- Slide 1 -->
<?php while($dat1=mysql_fetch_assoc($query1)){  $img = " SELECT foto FROM imagen WHERE idh = $dat1[idh] ";
$resultado1= @mysql_query($img) or die(mysql_error());
$datos2 = mysql_fetch_assoc($resultado1);
$ruta1 = "imagenes/" . $datos2['foto'];
                      ?>
<div class="item active">
           <a  href="detallehosp.php?id=<?php echo $dat1['idh'] ?>" > <img   src="<?php echo $ruta1; ?>"  /> </a>

 
        </div> <?php } ?>

<?php while($dat=mysql_fetch_assoc($query)){  $img = " SELECT foto FROM imagen WHERE imagen_id = $dat[imagen_id] ";
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
  width: 600px;
    margin: 0 auto;
}
</style>
  </article>  
  
  <article class="col-md-4">
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
  font-size: 5rem;
  
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
  <?php 
$solicitudes = mysql_query("Select * from solicitar where idu = '$iduser' AND idh = '$num' order by estado desc" );
$numerosolicitudes = mysql_num_rows($solicitudes);
 $sol=mysql_fetch_array($solicitudes);   $idhosp = $sol['idh'];
     $idusuario1 = mysql_query("Select idu from hospedaje where idh = '$idhosp'");
         $idusuario2 = mysql_fetch_array($idusuario1);
         $idusuario3 = $idusuario2['idu'];
     $puntuacion = mysql_query("Select * from puntuacionusuario where idu='$idusuario3' AND puntuador = '$iduser'");
     $cant_punt_usuario = mysql_num_rows($puntuacion);  ?>
     <td> 
     <?php if(($sol['estado']==4)AND($cant_punt_usuario==0)){ ?>
<p style="color:white"> Calificar Usuario </p>
      <div class="ec-stars-wrapper">
   
 
 
   <a  href="puntuarusuario1.php?id=<?php echo $num ?>&radio1=1"    name="radio1"    title="Votar con 1 estrellas">&#9733;</a>
   <a  href="puntuarusuario1.php?id=<?php echo $num ?>&radio1=2"    name="radio1"    title="Votar con 1 estrellas">&#9733;</a>
   <a  href="puntuarusuario1.php?id=<?php echo $num ?>&radio1=3"    name="radio1"    title="Votar con 1 estrellas">&#9733;</a>
   <a  href="puntuarusuario1.php?id=<?php echo $num ?>&radio1=4"    name="radio1"    title="Votar con 1 estrellas">&#9733;</a>
   <a  href="puntuarusuario1.php?id=<?php echo $num ?>&radio1=5"    name="radio1"    title="Votar con 1 estrellas">&#9733;</a>

</div></td> <?php } 

      $puntuacion1 = mysql_query("Select * from puntuacion where idh = '$idhosp' AND puntuador = '$iduser'");
    $cant_punt_hosp = mysql_num_rows($puntuacion1);  ?>

    <td><?php if(($sol['estado']==4)AND($cant_punt_hosp==0)){ ?>
      <p style="color:white"> Calificar Hospedaje </p>
      <div class="ec-stars-wrapper">


   <a  href="puntuarhospedaje1.php?id=<?php echo $num ?>&radio1=1"    name="radio1"    title="Votar con 1 estrellas">&#9733;</a>
   <a  href="puntuarhospedaje1.php?id=<?php echo $num ?>&radio1=2"    name="radio1"    title="Votar con 1 estrellas">&#9733;</a>
   <a  href="puntuarhospedaje1.php?id=<?php echo $num ?>&radio1=3"    name="radio1"    title="Votar con 1 estrellas">&#9733;</a>
   <a  href="puntuarhospedaje1.php?id=<?php echo $num ?>&radio1=4"    name="radio1"    title="Votar con 1 estrellas">&#9733;</a>
   <a  href="puntuarhospedaje1.php?id=<?php echo $num ?>&radio1=5"    name="radio1"    title="Votar con 1 estrellas">&#9733;</a>
</div>
</td> <?php } ?>
    </tr>
       <td> 
                </tr>

<br>


                  <?php /// ACA EMPIEZA PUNTUACION USUARIO
                  $dat12=mysql_fetch_array($datos6);
        $suma2 = 0; 
                $puntajeusuario = mysql_query("Select * from puntuacionusuario where idu='$dat12[idu]'");
        $num2 = mysql_num_rows($puntajeusuario);
                if($num2>0){
        while($pt=mysql_fetch_array($puntajeusuario)){
        $suma2 = $suma2 + $pt['puntuacion'];
        }
        $suma2 = $suma2 / $num2;
        $suma2= round($suma2);
        } ?>
        <?php
        $suma = 0;
$num = mysql_num_rows($puntaje);
if($num>0){
while($dat=mysql_fetch_array($puntaje)){
$suma = $suma + $dat['Puntuacion'];
}
$suma = $suma / $num;
        $suma= round($suma);

} ?>


        <table class="table" style="color:white">
          
          <thead>
            <tr>
              <th>Puntajes</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td> <p style="color: white; display:inline"> <?php echo " Del dueño del Hospedaje: "; echo $suma2;  ?> <?php for ($i=0; $i < $suma2 ; $i++) { ?>
               <h3 style="color: yellow; display:inline">&#9733;</h3> <?php
              } ?> </p> <?php
        ?></td>
             
            </tr>
            <tr> <td >     <p style="color: white; display:inline"> <?php echo "Del Hospedaje: "; echo $suma; ?> </p> <?php for ($i=0; $i < $suma ; $i++) {?>
               <h3 style="color: yellow; display:inline">&#9733;</h3> <?php
              } ?> </p> <?php
 

        /// aca termina?></td></tr>
          </tbody>
        </table>
        <br> 
     <br>
<?php $dat8=mysql_fetch_array($datos7);
        $idu1 = $dat8['idu'];

        
       if(isset($_SESSION["session_username"])) { /// SOLICITAR  
 $solicitado = mysql_query("Select * from solicitar where idu = '$iduser' AND idh = '$id1' ");
 $cant_sol = mysql_num_rows($solicitado);
 $check = mysql_query("SELECT * FROM solicitar
WHERE (idu = '$idu1') AND (idh = '$id1') AND (CURDATE() BETWEEN fechainicio AND fechafin) AND ( estado  = 0 or estado = 1 or estado = 4)  ");

 $numcheck = mysql_num_rows($check);

  if (isset($_SESSION['session_username'] )   and ($numcheck == 0) and ($iduser != $idu1)  and ($rol15['roll_admin']==0 )) { ?>   
 <form name="choice2" action="solicitar.php" target="_top" method="get">
 <button class="glyphicon glyphicon-calendar"  style="height:50px; width:180px; font-size:14px; font-weight: bold;" type="submit" name="id" value=<?php echo $id1; ?>> Solicitar hospedaje </button>
<?php } } ?>
 </form>
    <br />

          <br />

    
             
  </article>

</section>

 
<?php


$consulta = "SELECT foto FROM imagen WHERE idh = $id1";
$resultado= @mysql_query($consulta) or die(mysql_error());
$datos1 = mysql_fetch_assoc($resultado);
$ruta = "imagenes/" . $datos1['foto'];





?>
<br>
<section class="row" style="color:white">
<br><br>
  <article class="col-md-3">
    
<table class="table" style="color: white">
  <thead>
  <th>Detalles</th>
  <?php while($dat11=mysql_fetch_array($datos5)){ $pa = $dat11['idp'];
        $p=mysql_query("Select nombre from paises where id='$pa'");
              $p1=mysql_query("Select nombre from provincia where idprov=$dat11[provincia]");
                $pais = mysql_fetch_array($p);
                        $provincia = mysql_fetch_array($p1); ?>
    <tr>
      <td>Pais: <?php echo $pais['nombre']; ?></td>
     
    </tr>
     <tr>
      <td>Provincia: <?php echo $provincia['nombre']; ?></td>
     
    </tr>
     <tr>
      <td>Ciudad: <?php echo $dat11['ciudad']; ?></td>
     
    </tr>
     <tr>
      <td>Direccion: <?php echo $dat11['direccion']; ?></td>

     
    </tr>
      <tr>
      <td>Precio: <?php echo $dat11['precio']; ?></d>
      
     
    </tr>

       <?php $idu = $dat11['idu'];
        $datos2 = mysql_query("Select * from usuario Where email = '$idu'");
                 while($dat1=mysql_fetch_array($datos2)){ ?>

 </tr>
      <tr>
      <td>Dueño: <?php echo $dat1['nombre']; echo " "; echo $dat1['apellido'];
                 ?></td>  <?php } ?>
      
     
    </tr>
     <?php $t=$dat12['idt'];
        $tt=mysql_query("Select nombre from tipo where idt = '$t'");
        $tipo=mysql_fetch_array($tt); ?>
          <tr>
      <td>Tipo de Hospedaje: <?php echo $tipo['nombre']; ?>
        
      </td>  <?php } ?>
      
     
    </tr>
  </thead>
  <tbody>
    <tr>
     
    </tr>
  </tbody>
</table>
               
  </article>

  <article class="col-md-3" style="margin-left: 300px">

      <table class="table" style="color: white">
        <thead>
          <tr>
            <th>Comodidades</th>
          </tr>
        </thead>
        <tbody>
         
          <?php
        $d=mysql_query("Select * from hc where idh = $id1");
        while($ddd=mysql_fetch_array($d)){
          $idcomm = $ddd['idc'];
          $hss = mysql_query("Select nombre from comodidad where idc = '$idcomm' ");
                    $br = mysql_fetch_array($hss); ?>
                     <tr>
            <td> <?php echo $br['nombre']; ?></td> <?php } ?>
         
          </tr>
        </tbody>
      </table>
        
       
        
        
                 
        
     
      
    </article>

    </section>

      

 
    <article class="row">
      
    <br><br><br><br>
            <div class="col-md-3" style="color:white">
              

            <?php  if (isset($_SESSION['session_username'] )  and ($rol15['roll_admin']==0 )) { ?> 
                           <h3 > Preguntas  </h3>

              <?php $idhospedaje= mysql_query ("Select idu from hospedaje where idh = '$id1'" );
        $idhospedaje1= mysql_fetch_array($idhospedaje);
          $idh2=$idhospedaje1['idu'];
         if ($id!=$idh2  ) { ?>
            
            <form name="preguntas" action="realizarpregunta2.php"   method="post" >
              <label id="campo" for="pregunta" ></label>
                              <input style="height:20px ;width:300px; " id="hola" onclick="agrandar();" required   placeholder="Realiza tu pregunta..."  type="text" name="pregunta"  /> 
                                <button class="btn btn-success"   name="idh" id="idh" type="submit" value=<?php echo  $id1; ?>> Enviar </button>
                               </form>  <?php }  } ?>
                               
       <br> <?php $pregunta = mysql_query("Select * from preguntas where idh = '$id1' and contestado = 1"); 
  while($preg=mysql_fetch_array($pregunta)){ ?>
    <label >
    <input type="text" disabled="disabled" style="color:#000; float:center ; height:20px; width:700px; " value="    <?php echo $preg['pregunta']; ?> "   />
  <br>
    <input type="text" disabled="disabled"  style=" color:#A4022B; text-indent:50px; float:center; height:20px; width:700px; " value="   <?php echo $preg['respuesta']; ?>"   />

  <?php 
  } 
  ?>
                  </div>
      
    </article>
   </section>

<br>
   <script >
  function agrandar() {
document.getElementById('hola').style.color = "blue" ; 
document.getElementById('hola').style.width = "500px" ;
 

  } 
  </script>
 <footer>
            <?php include("footer.php"); ?>

       
   </footer>

</body>
</html>
