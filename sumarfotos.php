<?php 


               require_once("connection.php");
               
         
               session_start(); 



 if(!isset($_SESSION["session_username"])) {
echo "<script language='javascript'>window.location='login.php'</script>"; 
} 

     $idactual=$_SESSION['session_username'];
  $actual = $_GET['id'];
  $cantidad = mysql_query("SELECT * FROM imagen WHERE idh='$actual'");
  $cant = mysql_num_rows($cantidad);
     $dt= mysql_query("Select roll_premium from usuario where email = '$idactual'");
 

      $rol = mysql_fetch_array($dt);
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

<link rel="stylesheet" href="css/formoid-flat-green.css" type="text/css" />
<script type="text/javascript" src="formoid_files/formoid1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>




  <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0,minimum-scale=1.0" />
  <title > CouchInn </title>
   

</head>
<body background="imagenes/fondo4.jpg">
  <?php include("header.php"); ?>
   <section class="main container" background="imagenes/fondo4.jpg">
      <section class="jumbotron">

        <div class="container">
            <h3>Subir mas fotos al hospedaje</h3>
          
        </div>      </section>
       <br>
 <?php if ($rol['roll_premium'] == 1 ) { 


  if ($cant <5) { ?>

    
                        
  

<form  action="sumarfotos1.php" method="POST" enctype="multipart/form-data"  class="formoid-flat-green" style="background-color:#1A2223;font-size:14px;font-family:'Lato', sans-serif;color:#666666;max-width:480px;min-width:150px">
   
  <div class="element-input">
    <label for="imagen">Imagenes:</label> <br> <br>


<?php 
$cuantas = 5 - $cant;
    for ($i=0; $i < $cuantas ; $i++) {  ?>
      

 <input type="file" name="imagen<?php echo $i; ?>"  id="imagen<?php echo $i; ?>" required />  
     


  <?php }  ?>

   <br>
     <input hidden type="text" name="idh" value="<?php echo $actual ?>"/>

   <input type="submit" name="subir" value="Subir"/> 
</div>

</form>
  <?php }    else echo "<script language='javascript'>alert ('El hospedaje ya posee la maxima cantidad de fotos posibles. ');window.location='hospusuario1.php'</script>";  }





  else echo "<script language='javascript'>alert ('Solo los usuarios premium pueden subir mas de una foto. ');window.location='validartarjeta.php' </script>" ?> 

 
   <footer>
   <br>
    <?php include("footer.php") ; ?>
        
   </footer>

</body>
</html>


	