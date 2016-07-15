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
  font-size: 2.5rem;
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

include("connection.php");
          
  if(isset($_SESSION["session_username"])) {
 $id11=$_SESSION["session_username"];
$dt0= mysql_query("Select * from usuario where email = '$id11'");
$datos24 = mysql_query("Select * from usuario where roll_usuario = 1 and email='$id11'");
		 $numrows=mysql_num_rows($datos24);
$datos34 = mysql_query("Select email from usuario where roll_admin = 1 and email='$id11'");
$roluser=mysql_fetch_array($dt0); 


     		              
     		              /// ACA EMPIEZA PUNTUACION USUARIO
        $suma3 = 0; 
                $puntajeusuario = mysql_query("Select * from puntuacionusuario where idu = '$id11'");
        $num2 = mysql_num_rows($puntajeusuario);
                if($num2>0){
        while($pt=mysql_fetch_array($puntajeusuario)){
        $suma3 = $suma3 + $pt['puntuacion'];
        }
        $suma3 = $suma3 / $num2;
        $suma3= round($suma3);
        } }?> 

<header> 
	<nav class="navbar navbar-inverse navbar-static-top" rolle="navigation"> 
				<div class="container">
					
					<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navegacion">
							<span class="sr-only"> Desplegar/Ocultar Menu </span>
							<span class="icon-bar"> </span>
							<span class="icon-bar"> </span>
							<span class="icon-bar"> </span>
					</button>
					<a href="index.php" class="">
									<img src="imagenes/logova.png" width="130px"; height="50px; "   alt="">

					</a>
					 </div>

					 <!-- Inicia Menu --> 
					 <div class="collapse navbar-collapse" id="navegacion" style="display: inline; float: right">
					 		<ul class="nav navbar-nav">
											 							  <li> <a class="btn btn-danger" style="color:#FFF"  href="index.php" > <span class="glyphicon glyphicon-home"></span> Inicio</a></li> 

						  <?php if(isset($_SESSION["session_username"]) and ($roluser ['roll_admin'] == 0 ) )  { ?>
  <li class="dropdown">   <a href="#" class="dropdown-toggle btn btn-warning" style="color:#FFF" data-toggle="dropdown">  Menú de Usuario <b class="caret"></b> </a>
        <ul class="dropdown-menu">
       
     

          <li><a href="altahosp1.php">Subir Hospedaje</a></li>
          <li><a href="hospusuario1.php">Mis Hospedajes</a></li>
          <li><a href="solicitudesusuario.php">Reservas Realizadas</a></li> 
         
        </ul>
      </li> <?php } ?> 

											 			<?php  if(isset($_SESSION["session_username"])) {  if($roluser ['roll_admin'] == 0 ) { ?>    <li><a class="btn btn-primary" style="color:#FFF" href="busqueda.php"><span class="glyphicon glyphicon-search"></span>   Buscar Hospedaje</a><?php } }  ?>
						                </li>
						      
						                
						                <li><a class="btn btn-info" style="color:#FFF" href="listadohospedajes.php"><span class="glyphicon glyphicon-th-list"></span>  Listado de Hospedajes</a>
						                </li>
						              <?php   if(isset($_SESSION["session_username"])) {  if(($numrows==1)and($roluser['roll_usuario']==1)) { ?>		<li><a class="btn btn-success" style="color:#FFF" href="validartarjeta.php">Pasar a premium</a></li> <?php } ?>
						             <?php   if(isset($_SESSION["session_username"])) { if($roluser ['roll_admin'] == 1 ) { ?>  
						                                <li><a style="color:#FFF" class="btn btn-success"   href="administrar.php"><span class="glyphicon glyphicon-wrench	Try it
"> </span>  Panel de Control </a></li> <?php } } }
														
														else {  ?>
						                               <li><a class="btn btn-warning" style="color: #FFF;" href="register.php"> <span class="glyphicon glyphicon-pencil"></span> Registrarse</a></li> <?php  }   ?>

					 		</ul>

					 		 <ul class="nav navbar-nav navbar-right">
							                  <?php if(!isset($_SESSION["session_username"])) { ?> 
							                  <li class="dropdown">
							                     <a href="http://www.jquery2dotnet.com" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>  Iniciar Sesion <b class="caret"></b></a>
							             <ul class="dropdown-menu" style="padding: 15px;min-width: 250px;">
							                        <li>
							                           <div class="row">
							                              <div class="col-md-12">
							                                 <form class="form" role="form" method="post" action="control.php" accept-charset="UTF-8" id="login-nav">
							                                    <div class="form-group">
							                                       <label class="sr-only" for="email">Email</label>
							                                       <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
							                                    </div>
							                                    <div class="form-group">
							                                       <label class="sr-only" for="clave">Contraseña</label>
							                                       <input type="password" name="clave" class="form-control" id="clave" placeholder="Contraseña" required>
							                                    </div>
							                                    <div class="checkbox">
							                                       <label>
							                                       <input type="checkbox"> Recordarme
							                                       </label>
							                                    </div>
							                                    <div class="form-group">
							 										                                   	
							                                       <button type="submit" class="btn btn-success btn-block">Entrar</button>
							                                       
							                                    </div>
							                                 </form>
							                              </div>
							                           </div>
							                        </li> <?php } ?> 
							            <?php if(isset($_SESSION["session_username"])) { ?> 

							            	  <li class="dropdown">
							                     <a href="http://www.jquery2dotnet.com" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>  Mi Cuenta<b class="caret"></b></a>
							             <ul class="dropdown-menu" style="padding: 15px;min-width: 350px;">
							                        <li>
							                           <div class="row">
							                              <div class="col-md-12">
							                                 <form class="form" role="form" method="post" action="logout.php" accept-charset="UTF-8" id="login-nav">
							                                 <?php  $id = $_SESSION['session_username'];
								$datos = mysql_query("Select * from usuario where email = '$id'");
								$dat = mysql_fetch_array($datos);
								 echo $dat['nombre'];?>  
								 <?php echo $dat['apellido'];
								 	 ?><p style="color: white; display:inline;">  <?php for ($i=0; $i < $suma3 ; $i++) { ?>
               <h3 style="color: yellow; display:inline">&#9733;</h3> <?php
              } ?> </p> 	 
							                                   
							                                    <div class="form-group">
							                                     <button formaction="modificarusuario.php " type="submit" class="btn btn-success btn-block">Editar Perfil</button>
							 										                                   	
							                                       <button type="submit" class="btn btn-success btn-block">Cerrar Sesion</button>
							                                       
							                                    </div>
							                                 </form>
							                              </div>
							                           </div>
							                        </li> <?php } ?> 



                      
                     </ul>
                     </ul>

					 	

					 </div>

					


				</div>

	</nav>
	 </header>
