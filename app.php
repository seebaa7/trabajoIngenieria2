<? include("seguridad.php");
session_start();
if(!isset($_SESSION["session_username"])) {
	header("Location:login.php");} ?>
<html>
<head>
<title>App</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<h1>Bienvenido al sistema!</h1>
<h2>Usuario: <?php echo $_SESSION["session_username"]; ?> </h2><br>
<p>Entro correctamente al sistema.</p><br><br>
<a href="salir.php">Salir</a>
</body>
</html>
