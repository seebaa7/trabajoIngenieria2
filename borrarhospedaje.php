<?php 
session_start(); 
  if(!isset($_SESSION['session_username'])){
  header("location: login.php");}
			require_once("connection.php");
			$idh=$_GET['id'];
            $idusuario = $_SESSION["session_username"];
			
			   
$ayudin = mysql_query("SELECT * FROM solicitar
WHERE ((estado = 0) OR (estado = 1)  OR (estado = 4 )) 



AND (idh = $idh) ");

$numerato = mysql_num_rows($ayudin);


			 if ($numerato == 0) {



			mysql_query("UPDATE couchinn2.hospedaje SET borrado = 1
            WHERE idh = $idh " ); 
			   echo"<script>alert('El hospedaje ha sido eliminado correctamente.');window.location.href=\"hospusuario1.php\"</script>"; }




			 		
			   else{
				echo"<script>alert('El hospedaje no ha podido ser eliminado ya que hay hospedajes asociados.');window.location.href=\"hospusuario1.php\"</script>";
			   }
               ?>



 
