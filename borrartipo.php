
<?php
    session_start(); 
  if(!isset($_SESSION['session_username'])){
  header("location: login.php");}
			require_once("connection.php");
			
		
              
               
           
			   
      
			   
			   
               $idtipo = $_GET['id'];
			   $datos = mysql_query("Select * from hospedaje where idt = '$idtipo' ");
			   $dat = mysql_num_rows($datos);
			   if($dat == 0){
               mysql_query("UPDATE couchinn2.tipo SET tipo.borrado = 1
            WHERE tipo.idt = $idtipo " ); 
			   echo"<script>alert('El tipo ha sido eliminado correctamente.');window.location.href=\"listadotipos.php\"</script>";
			   }		
			   else{
				echo"<script>alert('El tipo no ha podido ser eliminado ya que hay hospedajes asociados.');window.location.href=\"listadotipos.php\"</script>";
			   }
               ?>
			 
