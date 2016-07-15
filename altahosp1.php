<?php 
require_once("connection.php");
session_start();
 
  if(!isset($_SESSION["session_username"])) {
echo "<script language='javascript'>window.location='login.php'</script>"; 
} else { $id=$_SESSION['session_username'];
$dt= mysql_query("Select * from usuario where email = '$id'");

$datos = mysql_query("Select email from usuario where roll_admin = 1 and email='$id'");
$datos22 = mysql_query("Select * from usuario where roll_usuario = 1 and email='$id'");
$roluser= mysql_query ("Select * from usuario where email='$id'");
$roluser1= mysql_fetch_array($roluser);
$rol=mysql_fetch_array($dt);
    if( $rol['roll_admin'] == 1 ) {
        echo "<script language='javascript'>window.location='administrar.php'</script>"; 
    }
    else {  $numrows=mysql_num_rows($datos);
$dt= mysql_query("Select roll_premium from usuario where email = '$id'");
$rol=mysql_fetch_array($dt);
} }?>

 

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
   <section class="main container" >
     
   </style>

        <section class="jumbotron">

        <div class="container">
            <h3>Subir Hospedaje</h3>
        </div>      </section>
       
       <br>

       <?php include ('altahosp.php'); ?>

    

 
   </section>

 <br>
   <footer>
           <?php include("footer.php"); ?>

        
   </footer>

</body>
</html>







       