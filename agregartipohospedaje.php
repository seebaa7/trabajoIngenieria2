<?php
require_once ("connection.php");
require_once("recursos.php");
	session_start();
	if(!isset($_SESSION['session_username'])){
		header("location: login.php");
	}
?>
<html>
<head>
<title>AgregarTipoDeHospedaje</title>



</head>
<body>
<?php	



if(!empty($_POST['nuevotipo'])) {
$tipo = $_POST['nuevotipo'];
$num = mysql_query("SELECT * FROM tipo WHERE nombre = '".$tipo."' ");
$ok = mysql_num_rows($num);
if($ok==0){
	mysql_query(" INSERT INTO couchinn.tipo (idt, nombre)
               VALUES (NULL,'$tipo')");}
	else{
		$message = "El nombre del tipo ya esta en uso";
	}
}
?>
 
<form name="volver" action="intropage.php" target="_top" method="post "> 
<input type="submit"   data-icon="back"  align="left" value="Volver atras" >	
</form>
<div align="center">
<h6><img src="imagenes/logova.png" width="345" height="88" ></h6>
<form name="registerform" id="registerform"  method="post">
Ingrese nuevo tipo:
<input type="text" name="nuevotipo" id="nuevotipo"><br>
<input type="submit" value="confirmar">
</form>
<?php if (!empty($message)) {echo "<p class=\"error\">" . "Atencion: ". $message . "</p>";} ?>
<div data-role="footer" data-theme="a" data-position="fixed" >
			
			<div data-role="controlgroup" data-type="horizontal" style="text-align:center;">

				  Indevelopers

			</div>
            <a href="ayuda/Usuario.pdf" data-icon="alert" style="text-align:left" >Ayuda</a>
            </div>		
	
</body>
</html>



