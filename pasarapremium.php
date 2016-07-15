<?php

require_once('connection.php');
               session_start(); 
			   if(!isset($_SESSION["session_username"])) {
echo "<script language='javascript'>window.location='login.php'</script>"; 
} 
			   $id=$_SESSION['session_username'];
			   mysql_query("Update couchinn2.usuario set roll_premium = 1 , roll_usuario = 0 where email = '$id'");
			  
			   $total1 = mysql_query("Select * from parametro where nombre = 'Valor de Membresia Premium'");
			   $total2 = mysql_fetch_array($total1);
			   $total = $total2['valor'];
			   mysql_query("INSERT INTO `pago`(`id`, `idu`, `idh`, `fecha`, `total`, `descripcion`, `tipo`) VALUES (NULL,'$id',0,curdate(),'$total','',2)");
			    			echo"<script>alert('Usted es ahora un usuario premium.');window.location.href=\"index.php\"</script>";
?>