<?php

require_once('connection.php');
     		 require_once('recursos.php');
			 include ("header.php");
               session_start(); 
			   if(!isset($_SESSION['session_username'])){
		header("location: login.php");
	}
			   $id=$_SESSION['session_username'];
			   mysql_query("Update couchinn.usuario set roll_premium =1  , roll_usuario=0   where email = '$id'");
			   
?>

<html>
<head>
<title></title>
<body>
	<div align="left "> 
	<div data-role="controlgroup" data-type="horizontal" >
	<form  name="choice" action="intropage.php" target="_top" method="post">
   <input type="submit" value="Volver Al Menu Anterior"  data-icon="back"> </form> </div> </div>
El pago ha sido simulado, usted ahora dispone de los beneficios de un usuario premium.
<div align="left">			
<?php include ("footer.php") ; ?>			 </div>
</body>
</html>