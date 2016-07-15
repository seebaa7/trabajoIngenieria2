<?php 
 require_once('connection.php');
if(!isset($_SESSION["session_username"])) {
	header("Location:login.php");}
if(isset($_SESSION["session_username"])){

header("Location: index.php");
}
  

     /* El query valida si el usuario ingresado existe en la base de datos. Se utiliza la función 
     htmlentities para evitar inyecciones SQL. */
     $myusuario = mysql_query("select email from usuario 
                                 where email =  '".htmlentities($_POST["email"])."'");
     $nmyusuario = mysql_num_rows($myusuario);

     //Si existe el usuario, validamos también la contraseña ingresada y el estado del usuario...
     if($nmyusuario != 0){
          $sql = "select email
               from usuario
               where
               email = '".htmlentities($_POST["email"])."' 
               and clave = '".(htmlentities($_POST["clave"]))."'";
          $myclave = mysql_query($sql);
          $nmyclave = mysql_num_rows($myclave);

          //Si el usuario y clave ingresado son correctos (y el usuario está activo en la BD), creamos la sesión del mismo.
          if($nmyclave != 0){
               session_start();
               //Guardamos dos variables de sesión que nos auxiliará para saber si se está o no "logueado" un usuario
               $_SESSION["autentica"] = "SIP";
               $_SESSION["session_username"] = mysql_result($myclave,0,0); //nombre del usuario logueado.
               //Direccionamos a nuestra página principal del sistema.
               header ("Location:index.php");
          }
          else{
               echo"<script>alert('La contrase\u00f1a del usuario no es correcta.');
               window.location.href=\"login.php\"</script>"; 
          }
     }else{
          echo"<script>alert('El usuario no existe.');window.location.href=\"login.php\"</script>";
     }
     
?>
