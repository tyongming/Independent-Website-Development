<?php
if(isset($_GET['a_can_id'])){

$rem_id = $_GET['a_can_id'];
   

require_once '../db.php';

$sqlrem = "UPDATE abyss
SET 
    help_stat ='Pending',
    help_id = ''
WHERE
    abyss_id = $rem_id;";

   $resultrem = mysqli_query($conn, $sqlrem); 
   
   if($resultrem ) { ?>
    
    <script>location.href = 'me.php'</script>
       
  <?php  }else{ 
        
       
       $_SESSION['doneerror']="Failed to Update!"; 
       
	}  
   }?>

   