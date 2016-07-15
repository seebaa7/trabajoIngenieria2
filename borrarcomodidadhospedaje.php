
   <?php
    session_start(); 
  if(!isset($_SESSION['session_username'])){
  header("location: login.php");}
			require_once("connection.php");
			
		
              
               
           
			   
      
			   
			   
               $id = $_POST['id'];
               $idh = $_POST['idh']; 
               mysql_query("UPDATE couchinn2.hc SET borrado = 1  WHERE idc = $id  AND idh = $idh "); 
			 echo"<script>alert('La comodidad ha sido eliminada correctamente.');window.location.href=history.go(-1)</script>";
			 
               ?>
  
 
  
}


