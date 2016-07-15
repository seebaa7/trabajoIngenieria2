<?php
	session_start();
?>
<html>
	<head>
		<!--realiza la conexion a la base de datos-->
		<?php
     		 require_once('connection.php');
     		 require_once('recursos.php');
    	?>
    </head>
<body>
<!--Pagina Principal-->
	<div data-role="page"	id="formulario">

         <!--cabecera-->
		<div data-role="header" data-theme="a" data-position="fixed">
			<!-- <a href="login.php" data-icon="star" data-iconpos="notext"></a> circulito-->
			<h6><img src="imagenes/logova.png" width="288" height="97"></h6>
			<div data-role="navbar">
				<ul>
					<li><a href="index1.php" target="_top" >Inicio</a></li>
                    <li><a href="register.php" target="_top"  >Registrarse</a></li> 

				</ul>	
			</div>
		</div>

		<div data-role="content">
			<h3>Podemos ayudarte a restablecer tu contraseña. Escribe tu correo para que enviemos tu nueva contraseña</h3>
			<?php
				 if(isset($_GET['NOENVIADO'])){
		  				   	echo"<h3>El mail no corresponde a ningun usuario.</h3>";		        			
		 				}
		 	?>

			<form action="verificoMail.php" method="post" data-ajax="false">
				<label for="correo" >Correo:</label>
				<input type="email" name="correo" id="correo" placeHolder="nombre@ejemplo.com">
				
				<input type="submit" value="Enviar" >
				<input type="reset" value="Borrar" >

			</form>

		</div>
		
		<?php include('footer.php');
				?>	
	
	
		
		</div>
	</div>


</body>
</html>