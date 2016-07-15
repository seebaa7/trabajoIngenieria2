<?php
require_once('connection.php');
               session_start(); 
			   if(!isset($_SESSION["session_username"])) {
 header("location:login.php");
			   }
 $idusuario = $_SESSION["session_username"];
 $idh = $_POST['buton'];
 $fechainicio=$_POST['inicio'];
 $fechafin=$_POST['fin'];
 $mensaje = $_POST['mensaje'];
 


$ayudin = mysql_query("SELECT * FROM solicitar
WHERE ((estado = 0) OR (estado = 1)  OR (estado = 4 )) 

		AND (  ('$fechainicio' BETWEEN fechainicio AND fechafin)
		OR   ('$fechafin'   BETWEEN fechainicio AND fechafin)
      OR  (('$fechainicio'  < fechainicio) AND ('$fechafin' > fechafin) ))


AND (idh = $idh) ");

$numerato = mysql_num_rows($ayudin);




if ($numerato == 0) {
 mysql_query("INSERT INTO `solicitar`(`idu`, `idh`,  `mensaje`, `pago`, `estado`, `fechainicio`, `fechafin`) VALUES ('$idusuario','$idh','$mensaje', 0 , 0, '$fechainicio', '$fechafin' ) ");
    echo"<script>alert('La solicitud ha sido enviada.');window.location.href=\"solicitudesusuario.php\"</script>";  }
    else {    echo"<script>alert('En la fecha seleccionada, el hospedaje se encuentra reservado.');window.location.href=history.go(-2);</script>";  }

	?>