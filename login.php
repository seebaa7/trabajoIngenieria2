
<html xmlns="http://www.w3.org/1999/xhtml">
<?php 
session_start();
require_once("connection.php");





if(isset($_SESSION["session_username"])){

header("Location: index.php");
}?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0,minimum-scale=1.0" />
<link href="css/login.css" rel="stylesheet" />

<link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/estilos.css"  />

      <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

</head>
<?php include("header.php"); ?>

<body background="imagenes/fondo4.jpg">
  <section class="row">
    
  
   <section class="main container"> 
          <section class="jumbotron" >

        <div class="container">
            <h3>Panel de Logueo </h3>
        </div>      </section>


      	<form action="control.php" method="post">
  <header>Login</header>
  <label>Usuario <span>*</span></label>
  <input  type="text" name="email" id="email" required="required"/>
  <div class="help">escriba su email</div>
  <label>Contraseña <span>*</span></label>
  <input type="password" name="clave" id="clave" required="required"/>
  <div class="help">escriba su contraseña</div>
  <button>Iniciar Sesion</button>
  	<label style="float:left">
  	<a   hidden href="olvide.php" > ¿ Olvidaste tu contraseña ? </a>
    </label>
</form>
    

  
  </section> </section>
<section class="row" style="bottom: 0px">
  

</section>
</body>
</html>