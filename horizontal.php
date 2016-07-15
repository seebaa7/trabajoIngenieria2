
  <?php if(isset($_SESSION["session_username"]) and ($roluser ['roll_admin'] == 0 ) )  { ?>
<nav class="navbar navbar-default" role="navigation">
  <!-- El logotipo y el icono que despliega el menú se agrupan
       para mostrarlos mejor en los dispositivos móviles -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse"
            data-target=".navbar-ex1-collapse">
      <span class="sr-only">Desplegar navegación</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
  </div>
 
  <!-- Agrupar los enlaces de navegación, los formularios y cualquier
       otro elemento que se pueda ocultar al minimizar la barra -->

  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav">
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          Menú de Usuario <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
       
     

          <li><a href="altahosp1.php">Subir Hospedaje</a></li>
          <li><a href="hospusuario1.php">Mis Hospedajes</a></li>
          <li><a href="solicitudesusuario.php">Reservas Realizadas</a></li> 
         
        </ul>
      </li>
    </ul>
  </div>
</nav>  <?php } ?> 