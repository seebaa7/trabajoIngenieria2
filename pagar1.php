<?php
require_once('connection.php');
               session_start(); 
			   if(!isset($_SESSION['session_username'])){
    header("location: login.php");
  }
  $idu = $_SESSION['session_username'];
  $idh = $_POST['idh'];
 $porc = mysql_query("Select * from parametro where nombre = 'Porcentaje ganado por hospedaje alquilado'");
 $porcentaje = mysql_fetch_array($porc);
 $ganancia = $porcentaje['valor'];
 $hospedaje = mysql_query("Select * from hospedaje where idh = '$idh'");
 $hospp = mysql_fetch_array($hospedaje);
 $total = $hospp['precio'] * $ganancia;
 $total = $total / 100; 
 mysql_query("UPDATE `solicitar` SET `pago`=1,`estado`=4 WHERE idu = '$idu' AND idh='$idh'");
 
mysql_query("INSERT INTO `pago`(`id`, `idu`, `idh`, `fecha`, `total`, `descripcion`, `tipo`) VALUES (NULL,'$idu','$idh',curdate(),'$total','',1)");
echo"<script>alert('El pago ha sido registrado y se ha reservado el hospedaje.');window.location.href=\"index.php\"</script>";
?>