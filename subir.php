<?php


               require_once("connection.php");
               
			   
               session_start(); 
if(!isset($_SESSION["session_username"])) {
echo "<script language='javascript'>window.location='login.php'</script>"; 
} 
	$permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
	$limite_kb = 100000000;
	$newfilename = rand(1,99999) . '.' . end(explode(".", $_FILES["imagen"]["name"]));


	if (in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite_kb * 1024){
		//esta es la ruta donde copiaremos la imagen
		//recuerden que deben crear un directorio con este mismo nombre
		//en el mismo lugar donde se encuentra el archivo subir.php
		$nombredefoto = $newfilename;
		$ruta = "imagenes/" . $nombredefoto ;
		//comprobamos si este archivo existe para no volverlo a copiar.
		//pero si quieren pueden obviar esto si no es necesario.
		//o pueden darle otro nombre para que no sobreescriba el actual.
		if (!file_exists($ruta)){
			//aqui movemos el archivo desde la ruta temporal a nuestra ruta
			//usamos la variable $resultado para almacenar el resultado del proceso de mover el archivo
			//almacenara true o false
			$resultado = @move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta);
			if ($resultado){
				$nombre = $_FILES['imagen']['name'];
				
				 $pais = $_POST['country'];
			  
               $ciudad = $_POST['ciudad'];
			   $capacidad = $_POST['capacidad'];
			   $provincia = $_POST['state'];
			   $precio = $_POST['precio'];
			   $direccion = $_POST['direccion'];
			   $tipo = $_POST['tipo'];
               $idu = $_SESSION['session_username'];
			   mysql_query("INSERT INTO `hospedaje`(`idh`, `idu`,  `capacidad`, `ciudad`, 
			   `provincia`, `idp`, `idt`, `precio`, `direccion`,`borrado`) VALUES ('','$idu','$capacidad','$ciudad','$provincia','$pais','$tipo','$precio','$direccion',0)"); 
               $datos=mysql_query("select  nombre,idt from tipo where borrado = 0") or
                        die("Problemas en el select:".mysql_error());
						echo"<script>alert('El hospedaje ha sido agregado correctamente.');window.location='hospusuario1.php'</script>"; 
						$id1 = mysql_query("SELECT idh from hospedaje where ciudad='$ciudad' and capacidad = '$capacidad' and provincia='$provincia'
						and direccion = '$direccion' and idu = '$idu'");
					    $id2 = mysql_fetch_array($id1);	
						$id = $id2['idh'];
						@mysql_query("INSERT INTO imagen (foto,idh) VALUES ('$nombredefoto','$id')") ;
						if(!(empty($_POST['checkbox']))){
						foreach ($_POST['checkbox'] as $a){
	$datos2 =mysql_query("Select * from hc where idh = '$id' AND idc ='$a'");
$ok = mysql_num_rows($datos2);
    if($ok==0){
	mysql_query(" INSERT INTO hc (hc, idh, idc,borrado)
               VALUES (NULL,'$id','$a',0)");
    }
						}		 
						}
			} else {
				echo "<script language='javascript'>alert ('ocurrio un error. intente mas tarde');window.location='altahosp1.php'</script>"; 
			}
		} else {
			if ( $_FILES['imagen']['name']) {
				echo "<script language='javascript'>alert ('no se pudo agregar. la imagen ya existe');window.location='altahosp1.php'</script>"; 

				}
		}
	} else {
		echo "<script language='javascript'>alert ('archivo no permitido: tipo no permitido o excede el tamaño ');window.location='altahosp1.php'</script>"; 
	
	}

?>

<?php

			
 
			if (in_array($_FILES['imagen2']['type'], $permitidos) && $_FILES['imagen2']['size'] <= $limite_kb * 1024){   
      
			   //esta es la ruta donde copiaremos la imagen
		//recuerden que deben crear un directorio con este mismo nombre
		//en el mismo lugar donde se encuentra el archivo subir.php
		$newfilename = rand(1,99999) . '.' . end(explode(".", $_FILES["imagen"]["name"]));
		$nombredefoto = $newfilename;
		$ruta = "imagenes/" . $nombredefoto ;
		//comprobamos si este archivo existe para no volverlo a copiar.
		//pero si quieren pueden obviar esto si no es necesario.
		//o pueden darle otro nombre para que no sobreescriba el actual.
		if (!file_exists($ruta)){
			//aqui movemos el archivo desde la ruta temporal a nuestra ruta
			//usamos la variable $resultado para almacenar el resultado del proceso de mover el archivo
			//almacenara true o false
			$resultado = @move_uploaded_file($_FILES["imagen2"]["tmp_name"], $ruta);
			  if ($resultado){
				$nombre = $_FILES['imagen2']['name'];
										@mysql_query("INSERT INTO imagen (foto,idh) VALUES ('$nombredefoto','$id')") ;
		
				}}}		 
               ?>	
 <?php

 
		
               



 
			if (in_array($_FILES['imagen5']['type'], $permitidos) && $_FILES['imagen5']['size'] <= $limite_kb * 1024){   
      
			   //esta es la ruta donde copiaremos la imagen
		//recuerden que deben crear un directorio con este mismo nombre
		//en el mismo lugar donde se encuentra el archivo subir.php
		$newfilename = rand(1,99999) . '.' . end(explode(".", $_FILES["imagen"]["name"]));
		$nombredefoto = $newfilename;
		$ruta = "imagenes/" . $nombredefoto ;
		//comprobamos si este archivo existe para no volverlo a copiar.
		//pero si quieren pueden obviar esto si no es necesario.
		//o pueden darle otro nombre para que no sobreescriba el actual.
		if (!file_exists($ruta)){
			//aqui movemos el archivo desde la ruta temporal a nuestra ruta
			//usamos la variable $resultado para almacenar el resultado del proceso de mover el archivo
			//almacenara true o false
			$resultado = @move_uploaded_file($_FILES["imagen5"]["tmp_name"], $ruta);
			  if ($resultado){
				$nombre = $_FILES['imagen5']['name'];
										@mysql_query("INSERT INTO imagen (foto,idh) VALUES ('$nombredefoto','$id')") ;
		
				}}}		 
               ?>	
               
               

<?php

 
			if (in_array($_FILES['imagen3']['type'], $permitidos) && $_FILES['imagen3']['size'] <= $limite_kb * 1024){   
      
			   //esta es la ruta donde copiaremos la imagen
		//recuerden que deben crear un directorio con este mismo nombre
		//en el mismo lugar donde se encuentra el archivo subir.php
		$newfilename = rand(1,99999) . '.' . end(explode(".", $_FILES["imagen"]["name"]));
		$nombredefoto = $newfilename;
		$ruta = "imagenes/" . $nombredefoto ;
		//comprobamos si este archivo existe para no volverlo a copiar.
		//pero si quieren pueden obviar esto si no es necesario.
		//o pueden darle otro nombre para que no sobreescriba el actual.
		if (!file_exists($ruta)){
			//aqui movemos el archivo desde la ruta temporal a nuestra ruta
			//usamos la variable $resultado para almacenar el resultado del proceso de mover el archivo
			//almacenara true o false
			$resultado = @move_uploaded_file($_FILES["imagen3"]["tmp_name"], $ruta);
			  if ($resultado){
				$nombre = $_FILES['imagen3']['name'];
										@mysql_query("INSERT INTO imagen (foto,idh) VALUES ('$nombredefoto','$id')") ;
		
				}}}		 
               ?>	
               
               

<?php

 
			if (in_array($_FILES['imagen4']['type'], $permitidos) && $_FILES['imagen4']['size'] <= $limite_kb * 1024){   
      
			   //esta es la ruta donde copiaremos la imagen
		//recuerden que deben crear un directorio con este mismo nombre
		//en el mismo lugar donde se encuentra el archivo subir.php
	$newfilename = rand(1,99999) . '.' . end(explode(".", $_FILES["imagen"]["name"]));
		$nombredefoto = $newfilename;
		$ruta = "imagenes/" . $nombredefoto ;
		//comprobamos si este archivo existe para no volverlo a copiar.
		//pero si quieren pueden obviar esto si no es necesario.
		//o pueden darle otro nombre para que no sobreescriba el actual.
		if (!file_exists($ruta)){
			//aqui movemos el archivo desde la ruta temporal a nuestra ruta
			//usamos la variable $resultado para almacenar el resultado del proceso de mover el archivo
			//almacenara true o false
			$resultado = @move_uploaded_file($_FILES["imagen4"]["tmp_name"], $ruta);
			  if ($resultado){
				$nombre = $_FILES['imagen4']['name'];
										@mysql_query("INSERT INTO imagen (foto,idh) VALUES ('$nombredefoto','$id')") ;
		
				}}}		 
               ?>	
               
               


               

