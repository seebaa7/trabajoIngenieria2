<?php

require_once("ddconfig.php");
$db_handle = new DBController();
$query ="SELECT * FROM paises";
$results = $db_handle->runQuery($query);
$id= $_SESSION['session_username'];
$rol1=mysql_query("Select * from usuario where email = '$id'") ;
$rol= mysql_fetch_array($rol1);



require_once("connection.php");  
if(!isset($_SESSION["session_username"])) {
 header("location:login.php");
} else {
               $tipos=mysql_query("select  nombre, idt from tipo where borrado = 0"	) or
                        die("Problemas en el select:".mysql_error());
               $pais=mysql_query("select nombre from paises") or
                        die("Problemas en el select:".mysql_error());
              
			   $datos=mysql_query("select * from comodidad");
?>

   
<html>
<head>
	<meta charset="utf-8" />
	<title>Subir Hospedaje - Formoid jquery form</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<link rel="stylesheet" href="css/formoid-flat-green.css" type="text/css" />
<script type="text/javascript" src="formoid_files/formoid1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script>
function getState(val) {
  $.ajax({
  type: "POST",
  url: "get_state.php",
  data:'country_id='+val,
  success: function(data){
    $("#state-list").html(data);
  }
  });

}
function selectCountry(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}
</script>


<form  action="subir.php" method="POST" enctype="multipart/form-data"  class="formoid-flat-green" style="background-color:#1A2223;font-size:14px;font-family:'Lato', sans-serif;color:#666666;max-width:480px;min-width:150px">
   


	
	<div class="element-input">
    <label for="imagen">Imagenes:</label>
     


	<input type="file" name="imagen" id="imagen" required=required />
	<?php if ($rol['roll_premium']==1) { ?>


		<input type="file" name="imagen2" id="imagen2" />

	<input type="file" name="imagen3" id="imagen3" />

	<input type="file" name="imagen4" id="imagen4" />

	<input type="file" name="imagen5" id="imagen5" />  <?php } ?>

    <label class="title">Ciudad<span class="required">*</span></label><input class="large" type="text" name="ciudad" required/></div>


<div>

<label>Pais:</label>
<select name="country" id="country-list" class="demoInputBox" onChange="getState(this.value);">
<option value="">Selecciona tu pais</option>
<?php
foreach($results as $country) {
?>
<option value="<?php echo $country["id"]; ?>"><?php echo $country["nombre"]; ?></option>
<?php
}
?>
</select>

<label>Provincia:</label>
<select name="state" id="state-list" class="demoInputBox" >
<option value="">Selecciona tu provincia</option>

</select>
</div>
	<div class="element-number"><label class="title">Capacidad<span class="required">*</span></label><input class="large" type="text" min="1" max="20" name="capacidad" required value=""/></div>
	<div class="element-input"><label class="title">Direccion<span class="required">*</span></label><input class="large" type="text" name="direccion" required/></div>
	<div class="element-select"><label class="title">Tipo de Hospedaje<span class="required">*</span></label><div class="large"><span><select name="tipo" required="required">
		<?php while($dato= mysql_fetch_array($tipos)){?>
         <option value ="<?php echo $dato['idt']; ?>"><?php echo $dato['nombre'];?></option> <?php } ?>
		</select><i></i></span></div></div>
	<div class="element-number"><label class="title">Precio<span class="required">*</span></label><input class="large" type="text" min="0" max="999999" name="precio" required value=""/></div>
	<label class="title">Comodidades del Hospedaje</label>		
                      
				  				
                                

					<?php   while($dato= mysql_fetch_array($datos)){ 
					   		if ($dato['borrado']==0 ){  ?>
                                <input type="checkbox" id="checkbox[]	" name="checkbox[]" value="<?php echo $dato['idc'];?>"/ ><span></span></label> <span style="color:white" class="clearfix"> <?php   echo $dato['nombre']; ?></span> 
                             
							   <br>
								<?php  } } ?>	
                                	

				<input type="submit" name="subir" value="Subir"/></div>
</form>



<?php } ?> 
