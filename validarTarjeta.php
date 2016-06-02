<?php
	session_start();
	if(!isset($_SESSION['session_username'])){
		header("location: login.php");
	}
?>
<html>
	<head>
		
		<?php
			
     		 require_once('connection.php');
     		 require_once('recursos.php');
    	?>
	
	</head>
	
	<body>

	 
	 
	<div data-role="page" id="administrar">
<div align= "center "  <h6><img src="imagenes/logova.png" width="345" height="88" ></h6> </div>
		
		<div data-role="header" data-theme="a" data-position="fixed">
		<br>
		<br>
		<?php
				if(isset($_SESSION['session_username'])){
					echo'<a href="modificarMisDatos.php"  target="_top" data-icon="gear" >'.$_SESSION['session_username'].'</a>';
					echo'<a href="logout.php"  target="_top" data-icon="delete" >Cerrar session</a>';
					echo'<a href="index1.php" target="_top" data-icon="home"  align="center" > Volver a Inicio </a> ' ;

				}
			?>
			
			
		</div>
	   
		<div data-role="content">
		
		  <h5>*Ingrese todos los datos de la tarjeta para pasar a premium.</h5>
			<ul data-role="listview" data-inset="true" > 
				<form  id="formu" name="formu" method="post" action="pasarapremium.php" >
					<label for="titular">Tarjeta:</label>
					<select class="element select meium" id="tarjetas" name="tarjetas" >
						<option value='Visa'>Visa</option> 	
						<option value='MasterdCard'>Master Card</option> 							
					</select>
					<label for="titular">Titular:</label>
					<input id="titular" name="titular" class="text" type="text" required="required"/> 
					<label for="tipDoc">Tipo de documento:</label>
					<select class="element select meium" id="tarjetas" name="tarjetas" >
						<option value='denei'>DNI</option> 	
						<option value='ci'>CI</option>
						<option value='lc'>LC</option>							
					</select>
					<label for="numdoc">Numero de documento:</label>
					<input id="numdoc"  class="text" type="number" name"edad" min="1" max="99999999"required="required"/>
					
					<label for="numtarj">Numero de tarjeta:</label>
					<input id="numtarj" name="edad" class="text" type="number" min="1111111111111111" max="9999999999999999" required="required"/>
					
					<label for="cvv">Codigo de seguridad:</label>
					<input id="cvv" name="edad" class="text" type="number" min="111" max="9999" required="required"/> 		

					<label for="vencimiento">Fecha de vencimiento (MM/AA):</label>
					<input id="vencimiento" name="vencimiento" class="text" type="month" required="required"/> 

					

					<input id="submit" class="button_text" type="submit" name="submit" value="Confirmar"  data-icon="check"/>
				</form>
			
			</ul>

			<div align="left">			
<?php include ("footer.php") ; ?>			 </div>
		
	</div>
		
	</body>
</html>