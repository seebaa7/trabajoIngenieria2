
   <?php
    session_start(); 
  if(!isset($_SESSION['session_username'])){
  header("location: login.php");}
			require_once("connection.php");
			
		
              
               
           
			   
      
			   
			   
               $id = $_GET['id'];
			   $datos = mysql_query("Select * from hc where idc = '$id' ");
			   $dat = mysql_num_rows($datos);
			   if($dat == 0){
               mysql_query("UPDATE couchinn2.comodidad SET borrado = 1
            WHERE idc = $id " ); 
			 echo"<script>alert('La comodidad ha sido eliminada correctamente.');window.location.href=\"listadocomodidades.php\"</script>";
			   }		
			   else{
				echo"<script>alert('La comodidad no ha podido ser eliminada ya que hay hospedajes asociados.');window.location.href=\"listadocomodidades.php\"</script>";
			   }
               ?>
  
 
  
}


