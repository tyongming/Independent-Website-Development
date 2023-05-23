<?php
if(isset($_GET['rem_id'])){

$rem_id = $_GET['rem_id'];
   

require_once '../db.php';

$sqlcan = "UPDATE abyss
SET 
    help_stat ='Cancelled',
    help_id = ''
WHERE
    abyss_id = $rem_id;";

   $resultcan = mysqli_query($conn, $sqlcan); 
   
   if($resultcan ) { ?>
    
    <script>location.href = 'me.php'</script>
       
  <?php  }else{ 
        
       
       $_SESSION['doneerror']="Failed to Update!"; 
       
	}  
   }?>
