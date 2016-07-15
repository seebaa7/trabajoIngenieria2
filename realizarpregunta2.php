<?php
require_once('connection.php');
               session_start(); 
			   if(!isset($_SESSION["session_username"])) {
 header("location:login.php");
			   }
			   $id = $_POST['idh'];
			   $user = mysql_query("Select idu from hospedaje where idh = '$id'");
			   $usr=mysql_fetch_array($user);
			   $idu=$usr['idu'];
			   $pregunta=$_POST['pregunta'];
			   mysql_query("Insert into `preguntas`(`idpregunta`, `idh`, `pregunta`, `respuesta`,`contestado`)
			   VALUES ('','$id','$pregunta','',0)");
			   echo"<script type='text/javascript'>alert('La pregunta ha sido enviada.');history.go(-1);</script>";
			   ?>