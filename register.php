
<?php
session_start();
?>
 
<?php require_once("connection.php"); 
	 require_once('recursos.php');
     		 
     		 ?>
    	
 
 <?php
 
if(isset($_POST['register'])){
 
if(!empty($_POST['nombre']) && !empty($_POST['email']) && !empty($_POST['apellido']) && !empty($_POST['dni'])&& !empty($_POST['telefono'])) {
 $telefono=$_POST['telefono'];
 $email=$_POST['email'];
 $nombre=$_POST['nombre'];
 $apellido=$_POST['apellido'];
 $dni=$_POST['dni'];
 
 
 $query=mysql_query("SELECT * FROM usuario WHERE email='".$email."'");
 $numrows=mysql_num_rows($query);
 
 if($numrows==0)
 {
 $sql="INSERT INTO usuario(email, nombre, apellido, telefono, dni) VALUES ('$email','$nombre','$apellido','$telefono','$dni')";
 
 
$result=mysql_query($sql);
 
 if($result){
 $message = "Cuenta Correctamente Creada";
 } else {
 $message = "Error al ingresar datos de la informacion!";
 }
 
} else {
 $message = "El nombre de usuario ya existe! Por favor, intenta con otro!";
 }
 
} else {
 $message = "Todos los campos no deben de estar vacios!";
}
}
?>
 

 
<div class="container mregister">
 <div id="login">
 <h1>Registrar</h1>
<form name="registerform" id="registerform" target="_top" action="register.php" method="post" >
 <p>
 <label for="user_login">Nombre <br />
 <input type="text" name="nombre" id="nombre" class="input" size="32" value="" /></label>
 </p>
 
 <p>
 <label for="user_pass">E-mail<br />
 <input type="email" name="email" id="email" class="input" value="" size="32" /></label>
 </p>
 
 <p>
 <label for="user_pass">DNI<br />
 <input type="text" name="dni" id="dni" class="input" value="" size="20" /></label>
 </p>
 
 <p>
 <label for="user_pass">Telefono<br />
 <input type="text" name="telefono" id="telefono" class="input" value="" size="32" /></label>
 </p>
 
 <p>
 <label for="user_pass">Apellido<br />
 <input type="text" name="apellido" id="apellido" class="input" value="" size="32" /></label>
 </p>
 
<p class="submit">
 <input type="submit" name="register" id="register" class="button" value="Registrar" />
 </p>
 
 <p class="regtext">Ya tienes una cuenta? <a href="login.php" >Entra Aquí!</a>!</p>
 <?php if (!empty($message)) {echo "<p class=\"error\">" . "Mensaje: ". $message . "</p>";} ?>
</form>
 
 </div>
 </div>
 
 <?php  ?>
