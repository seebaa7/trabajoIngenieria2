<! DOCTYPE HTML>
<html>
<head>
<?php
session_start();
include("connection.php");             
    ?>

  <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0,minimum-scale=1.0" />
  <title > CouchInn </title>
  <link rel="stylesheet" href="css/register.css" >

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
        



     <?php
 
if(isset($_POST['register'])){
 
if(!empty($_POST['nombre']) && !empty($_POST['email']) && !empty($_POST['apellido']) && !empty($_POST['dni'])&& !empty($_POST['telefono'])&& !empty($_POST['contraseña'])) {
 $telefono=$_POST['telefono'];
 $email=$_POST['email'];
 $nombre=$_POST['nombre'];
 $apellido=$_POST['apellido'];
 $dni=$_POST['dni'];
 $clave=$_POST['contraseña'];
 
 
 $query=mysql_query("SELECT * FROM usuario WHERE email='".$email."'");
 $numrows=mysql_num_rows($query);
 
 if($numrows==0)
 {
 $sql="INSERT INTO usuario(email, nombre, apellido, telefono, dni,roll_usuario,clave,fecha) VALUES ('$email','$nombre','$apellido','$telefono','$dni',1, '$clave',curdate())";
 
 
$result=mysql_query($sql);
 
 if($result){
 echo"<script>alert('Cuenta creada.');window.location.href=\"index.php\"</script>";
 }
 
} else {
  echo"<script>alert('Usuario ya registado...');window.location.href=\"register.php\"</script>";
 }
 
}
}
?>
 
<div class="wrapper"  >
  <h3 style="color: #FFF">Crea tu cuenta</h3>
  <p style="color: #FFF"> Completando este registro usted obtendra una cuenta de usuario normal. Recuerde que puede
  solicitar ser usuario premium en cualquier momento y obtener mas beneficios.</p>

<form id="registerform" class="registerform" method="post" action="register.php">

    <input  name="nombre" type="text" id="nombre" class="name" placeholder="Name"required="required">
    <div>
      <p  style="color: #FFF" class="name-help">Por favor ingrese su nombre.</p>
    </div>
    <input name="email" type="email" id="email"class="email" placeholder="Email"required="required">
     <div>
      <p  style="color: #FFF" class="email-help">Por favor ingrese su email.</p>
    </div>
    
     <input name="apellido" type="text"id="apellido" class="apellido" placeholder="Apellido"required="required">
    <div>
      <p  style="color: #FFF" class="apellido-help">Por favor ingrese su apellido.</p>
    </div> 
    <input name="telefono" type="text" id="telefono"class="telefono" placeholder="Telefono"required="required">
    <div>
      <p  style="color: #FFF" class="telefono-help">Por favor ingrese su Telefono.</p>
    </div> 
    <input  name="dni" type="text"id="dni" class="dni" placeholder="DNI" required>
    <div>
      <p  style="color: #FFF" class="dni-help">Por favor ingrese su DNI sin puntos ni espacios</p>
    </div>
      <input name="contraseña" type="text" id="contraseña" class="contraseña" placeholder="Contraseña" required="required">
    <div>
      <p  style="color: #FFF" class="contraseña-help">Por favor ingrese su contraseña.</p>
    </div> 
    <input type="submit" name="register" id="register"class="button" value="Registrarse">
  
 <p style="color: #FFF" class="regtext">Ya tienes una cuenta? <a href="login.php" target="_top" >Entra Aquí!</a>!</p>

 </form> </div> 
 <script type="text/javascript" >
$(".name").focus(function(){
  $(".name-help").slideDown(500);
}).blur(function(){
  $(".name-help").slideUp(500);
});
$(".contraseña").focus(function(){
  $(".contraseña-help").slideDown(500);
}).blur(function(){
  $(".contraseña-help").slideUp(500);
});
$(".dni").focus(function(){
  $(".dni-help").slideDown(500);
}).blur(function(){
  $(".dni-help").slideUp(500);
});
$(".telefono").focus(function(){
  $(".telefono-help").slideDown(500);
}).blur(function(){
  $(".telefono-help").slideUp(500);
});
$(".apellido").focus(function(){
  $(".apellido-help").slideDown(500);
}).blur(function(){
  $(".apellido-help").slideUp(500);
});
$(".email").focus(function(){
  $(".email-help").slideDown(500);
}).blur(function(){
  $(".email-help").slideUp(500);
});

</script>

      
    
   </section>

 <footer>
       <?php include("footer.php"); ?>

        
   </footer>

</body>
</html>

