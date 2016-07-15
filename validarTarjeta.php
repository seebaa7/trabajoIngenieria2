<?php
session_start();
  if(!isset($_SESSION['session_username'])){
    header("location: login.php");
  }
?>
<?php 
require_once("connection.php");

 
  if(!isset($_SESSION["session_username"])) {
echo "<script language='javascript'>window.location='login.php'</script>"; 
} else { $id=$_SESSION['session_username'];
    $datos24 = mysql_query("Select email from usuario where roll_admin = 1 and email='$id'");
     $numrows=mysql_num_rows($datos24);
$dt= mysql_query("Select roll_premium from usuario where email = '$id'");
$dt1= mysql_query("Select roll_admin from usuario where email = '$id'");
$rol=mysql_fetch_array($dt);
$gata = mysql_query ("select valor from parametro where nombre ='Valor de Membresia Premium'");
$valor = mysql_fetch_array($gata);
$valor = $valor['valor'];
$rol1=mysql_fetch_array($dt1);
$datos21 = mysql_query("Select idh, provincia, ciudad, direccion, precio from hospedaje");
 }

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



<script type="text/javascript">
$(document).ready(function(){
  $('#login-trigger').click(function(){
    $(this).next('#login-content').slideToggle();
    $(this).toggleClass('active');          
    
    if ($(this).hasClass('active')) $(this).find('span').html('&#x25B2;')
      else $(this).find('span').html('&#x25BC;')
    })
});</script>


  <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0,minimum-scale=1.0" />
  <title > CouchInn </title>
   

</head>
<body background="imagenes/fondo4.jpg">
  <?php include("header.php"); ?>
   <section class="main container" 
     
   </style>

        <section class="jumbotron">

        <div class="container">
            <h3>Convertirse en Usuario Premium por un valor de $ <?php echo $valor ?> </h3>
        </div>      </section>
       
       <br>

<div id="formulario" > 
<form action="pasarapremium.php" class="formoid-flat-green" style="background-color:#2d2d2d;font-size:14px;font-family:'Lato', sans-serif;color:#666666;max-width:480px;min-width:150px" method="post">
  <div class="element-select" title="Elija con que tarjeta quiere pagar"><label class="title">Elija tarjeta<span class="required">*</span></label><div class="large"><span><select name="select" required="required">

    <option value="Visa ">Visa </option>
    <option value="MasterCard">MasterCard</option>
    <option value="American Express">American Express</option></select><i></i></span></div></div>
  <div class="element-input"><label class="title">Titular<span class="required">*</span></label><input class="large" type="text" name="input1" required/></div>
  <div class="element-select"><label class="title">Tipo de Documento<span class="required">*</span></label><div class="large"><span><select name="select1" required="required">

    <option value="DNI">DNI</option>
    <option value="CI">CI</option>
    <option value="LC">LC</option></select><i></i></span></div></div>
  <div class="element-input"><label class="title" >Numero de Documento<span class="required">*</span></label><input class="large" type="text" name="input2" min="1" max="99999999" required/></div>
  <div class="element-input"><label class="title">Numero De Tarjeta<span class="required">*</span></label><input class="large" type="number" name="input5" min="1111111111111111" max="9999999999999999" placeholder="Ingrese los 16 digitos de su tarjeta" required/></div>
  <div class="element-input"><label class="title">Codigo de Seguridad<span class="required">*</span></label><input class="large" type="number" name="input4"  min="000" max="999" required/></div>
  <div class="element-input"><label class="title">Fecha de Vencimiento (MM/AA)<span class="required">*</span></label><input class="large" type="month" name="input3" required/></div>
<div class="submit"><input type="submit" value="Enviar Datos "/></div></form>
</div>
  

    

 
   </section>

 <br>
   <footer>
              <?php include("footer.php"); ?>

        
   </footer>

</body>
</html>







       

	
		 
     		





	

