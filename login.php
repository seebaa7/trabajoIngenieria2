
<?php
session_start();
?>
 


<html>
<head>
<?php require_once("connection.php");  

     		require_once('recursos.php') ;
			
    	?>
	
	<link rel="icon" type="image/ico" href="favicon.ico">
</head>
<body>

<div align="center">
	 <h6><img src="imagenes/logova.png" width="345" height="88" ></h6>
<?php
 
if(isset($_SESSION["session_username"])){

header("Location: intropage.php");
}
 
if(isset($_POST["login"])){
 
	if(!empty($_POST['email']) && !empty($_POST['clave'])) {
		 $email=$_POST['email'];
		 $password=$_POST['clave'];
 
			$query =mysql_query("SELECT * FROM usuario WHERE email='".$email."' AND clave='".$password."'");
 
			$numrows=mysql_num_rows($query);
 				if($numrows!=0){
 							while($row=mysql_fetch_assoc($query)){
 									$dbusername=$row['email'];
 									$dbpassword=$row['clave'];
																 }
 
							if($email == $dbusername && $password == $dbpassword){
 
 										$_SESSION['session_username']=$email; 
 										header("Location: intropage.php");
																				 }
								 } 
 							else { 
								$message= "Nombre de usuario ó contraseña invalida!";
																			 }
							} 
				else {
 					$message = "Todos los campos son requeridos!";
															}
}
?>
 
 
 <h1>Logueoooo</h1>
<form name="loginform" id="loginform" action="" method="POST" target="_top">
 
 <label for="usuario">Nombre De Usuario<br />
 <input type="text" name="email" id="email" class="input" value="" size="20" /></label>
 
 
 <label for="contraseña">Contraseña<br />
 <input type="password" name="clave" id="clave" class="input" value="" size="20" /></label>
 
 
 <input type="submit" name="login" class="button" value="Entrar" />
 

</form>
  <p class="regtext">No estas registrado? <a href="register.php" target="_top" >Registrate Aquí</a>!</p>

 
</div>
 <div data-role="footer" data-theme="a" data-position="fixed" >
			
			<div style="text-align:center; ">

				  Indevelopers

			</div>
			
            <a href="ayuda/Usuario.pdf" data-icon="alert" data-ajax="false" style="text-align:left" >Ayuda</a>
     </div>
 
 
 <?php if (!empty($message)) {echo "<p class=\"error\">" . "Atencion: ". $message . "</p>";}  ?>
 
</body>
</html>