<?php
require_once("ddconfig.php");
$db_handle = new DBController();
if(!empty($_POST["country_id"])) {
	$query ="SELECT * FROM provincia WHERE idp = '" . $_POST["country_id"] . "'";
	$results = $db_handle->runQuery($query);
?>
	<option value="" >Selecciona tu provincia</option>
<?php
	foreach($results as $state) {
?>
	<option value="<?php echo $state["idprov"]; ?>"><?php echo $state["nombre"]; ?></option>
<?php
	}
}
?>