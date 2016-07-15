
<?php 
session_start();
require_once("connection.php"); 
if(!isset($_SESSION["session_username"])) {
  header("Location:login.php");}

$id = $_SESSION['session_username'];
$datos = mysql_query("Select * from usuario where email = '$id'");
$datos11 = mysql_query("Select * from usuario where email = '$id'");

$dat = mysql_fetch_array($datos);
$datos1 = mysql_query("Select email from usuario where roll_admin = 1 and email='$id'");
$rol=mysql_fetch_array($datos11);
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






  <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0,minimum-scale=1.0" />
  <title > CouchInn </title>
   

</head>
<body background="imagenes/fondo4.jpg">
  <?php include("header.php"); ?>
   <section class="main container" ;>
     
   </style>

        <section class="jumbotron">

        <div class="container">
            <h3>Mis Datos Personales</h3>
        </div>      </section>
       
       
 <form  action="modificarusuario1.php" method="post">
          <div class="box">
            <label>
               <span style="color: white" >Nombre *</span>
               <input style="margin-left:124px" type="text" class="input_text" name="nombre" id="name" value="<?php echo $dat['nombre']; ?>" placeholder="Name"required="required">
            </label>
            <br>
            <label>
               <span style="color: white">Apellido *</span>
               <input style="margin-left:120px" type="text" class="input_text" name="apellido" id="name"value="<?php echo $dat['apellido']; ?>" placeholder="Name"required="required">
            </label>
             <br>
            <label>
               <span style="color: white">Telefono *</span>
               <input style="margin-left:117px" type="text" class="input_text" name="telefono" id="name"value="<?php echo $dat['telefono']; ?>" placeholder="Name"required="required">
            </label>
             <br>
             <label>
               <span style="color: white">Dni *</span>
               <input style="margin-left:154px" type="text" class="input_text" name="dni" id="email"value="<?php echo $dat['dni']; ?>" placeholder="Name"required="required">
            </label>
             <br>
             <label>
                <span style="color: white">contraseña *</span>
                <input style="margin-left:100px" type="password" class="input_text" name="contraseña" id="subject"value="<?php echo $dat['clave']; ?>" placeholder="Name"required="required">
            </label>
             <br>
            <label>
              <input type="submit" class="button" value="Enviar" />
      </label>
        </div>
    </form>

 
   </section>

 
   <footer>
         <?php include("footer.php"); ?>

   </footer>

</body>
</html>







 


