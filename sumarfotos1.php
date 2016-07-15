<?php


               require_once("connection.php");
               
			   
               session_start(); 

	$permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
	$limite_kb = 10000;
	$newfilename = rand(1,99999) . '.' . end(explode(".", $_FILES["imagen0"]["name"]));


	if (in_array($_FILES['imagen0']['type'], $permitidos) && $_FILES['imagen0']['size'] <= $limite_kb * 1024){
		//esta es la ruta donde copiaremos la imagen
		//recuerden que deben crear un directorio con este mismo nombre
		//en el mismo lugar donde se encuentra el archivo subir.php
		$nombredefoto = $newfilename;
		$ruta = "imagenes/" . $nombredefoto ;
		//comprobamos si este archivo existe para no volverlo a copiar.
		//pero si quieren pueden obviar esto si no es necesario.
		//o pueden darle otro nombre para que no sobreescriba el actual.
		
			//aqui movemos el archivo desde la ruta temporal a nuestra ruta
			//usamos la variable $resultado para almacenar el resultado del proceso de mover el archivo
			//almacenara true o false
			$resultado = @move_uploaded_file($_FILES["imagen0"]["tmp_name"], $ruta);
			if ($resultado){
				$nombre = $_FILES['imagen0']['name'];
				
				 $idh = $_POST['idh'];
			  @mysql_query("INSERT INTO imagen (foto,idh) VALUES ('$nombredefoto','$idh')") ;
				
	
 
						}		 
						
			} 
		
	
?>

<?php

			
 
			if (in_array($_FILES['imagen1']['type'], $permitidos) && $_FILES['imagen1']['size'] <= $limite_kb * 1024){   
      
			   //esta es la ruta donde copiaremos la imagen
		//recuerden que deben crear un directorio con este mismo nombre
		//en el mismo lugar donde se encuentra el archivo subir.php
		$newfilename = rand(1,99999) . '.' . end(explode(".", $_FILES["imagen1"]["name"]));
		$nombredefoto = $newfilename;
		$ruta = "imagenes/" . $nombredefoto ;
		//comprobamos si este archivo existe para no volverlo a copiar.
		//pero si quieren pueden obviar esto si no es necesario.
		//o pueden darle otro nombre para que no sobreescriba el actual.
			//aqui movemos el archivo desde la ruta temporal a nuestra ruta
			//usamos la variable $resultado para almacenar el resultado del proceso de mover el archivo
			//almacenara true o false
			$resultado = @move_uploaded_file($_FILES["imagen1"]["tmp_name"], $ruta);
			  if ($resultado){
				$nombre = $_FILES['imagen1']['name'];
										@mysql_query("INSERT INTO imagen (foto,idh) VALUES ('$nombredefoto','$idh')") ;
		
				}}		 
               ?>	
 <?php

 
		
               

if (isset($_FILES['imagen3'])) {
 
			if (in_array($_FILES['imagen2']['type'], $permitidos) && $_FILES['imagen2']['size'] <= $limite_kb * 1024){   
      
			   //esta es la ruta donde copiaremos la imagen
		//recuerden que deben crear un directorio con este mismo nombre
		//en el mismo lugar donde se encuentra el archivo subir.php
		$newfilename = rand(1,99999) . '.' . end(explode(".", $_FILES["imagen2"]["name"]));
		$nombredefoto = $newfilename;
		$ruta = "imagenes/" . $nombredefoto ;
		//comprobamos si este archivo existe para no volverlo a copiar.
		//pero si quieren pueden obviar esto si no es necesario.
		//o pueden darle otro nombre para que no sobreescriba el actual.
			//aqui movemos el archivo desde la ruta temporal a nuestra ruta
			//usamos la variable $resultado para almacenar el resultado del proceso de mover el archivo
			//almacenara true o false
			$resultado = @move_uploaded_file($_FILES["imagen2"]["tmp_name"], $ruta);
			  if ($resultado){
				$nombre = $_FILES['imagen2']['name'];
										@mysql_query("INSERT INTO imagen (foto,idh) VALUES ('$nombredefoto','$idh')") ;
		
				}}	}
	 
               ?>	
               
               

<?php

 			if (isset($_FILES['imagen3'])) {

			if (in_array($_FILES['imagen3']['type'], $permitidos) && $_FILES['imagen3']['size'] <= $limite_kb * 1024){   
      
			   //esta es la ruta donde copiaremos la imagen
		//recuerden que deben crear un directorio con este mismo nombre
		//en el mismo lugar donde se encuentra el archivo subir.php
		$newfilename = rand(1,99999) . '.' . end(explode(".", $_FILES["imagen3"]["name"]));
		$nombredefoto = $newfilename;
		$ruta = "imagenes/" . $nombredefoto ;
		//comprobamos si este archivo existe para no volverlo a copiar.
		//pero si quieren pueden obviar esto si no es necesario.
		//o pueden darle otro nombre para que no sobreescriba el actual.
		//if (!file_exists($ruta)){
			//aqui movemos el archivo desde la ruta temporal a nuestra ruta
			//usamos la variable $resultado para almacenar el resultado del proceso de mover el archivo
			//almacenara true o false
			$resultado = @move_uploaded_file($_FILES["imagen3"]["tmp_name"], $ruta);
			  if ($resultado){
				$nombre = $_FILES['imagen3']['name'];
										@mysql_query("INSERT INTO imagen (foto,idh) VALUES ('$nombredefoto','$idh')") ;
		
				}}	}


		echo "<script language='javascript'>alert ('Imagenes subidas exitosamente');window.location='hospusuario1.php'</script>"; 

               ?>	
               
               


               


               

