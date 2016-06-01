<?php
	session_start();
?>
<!doctype html>
<html>
<head>
<?php require_once("recursos.php");   ?>
	<meta charset="utf-8">
	<title>CouchInn</title>
	<link rel="icon" type="image/ico" href="favicon.ico">
	
</head>


<div align="center">
<body>
	
	 <h6><img src="imagenes/logova.png" width="345" height="88" ></h6>
     

		
<form name="form1" action="register.php" target="_top" method="post" >
<input type="submit" value="Registrarse"  >
</form>    
  <form name="form2" action="login.php" target="_top" method="post" style="background-color:rgba(146,138,138,1.00)">
    <input type="submit" value="Iniciar  Sesion">
    </a>
    
  </form>	 
</div>

<div align="left">

	
      <ul  class=" navbar ">
        <li><a href="#buscarhospedaje.php">Buscar Hospedaje</a></li>
        <li><a href="#ofrecerhospedaje.php">Ofrecer Hospedaje</a></li>
        <li><a href="#contacto.php">Contactenos</a></li>
        <li><a href="#acercadecouchinn.php">Acerca de Couchinn</a></li>
      </ul>
</div>
<div data-role="footer" data-theme="a" data-position="fixed" >
			
			<div data-role="controlgroup" data-type="horizontal" style="text-align:center;">

				  Indevelopers

			</div>
			
            <a href="ayuda/Usuario.pdf" data-icon="alert" style="text-align:left" >Ayuda</a>
            </div>		
	
</body>
</html>