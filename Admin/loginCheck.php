<?php
    
    //check whether user is login or not
    if(!isset($_SESSION['access_token'])){
        header("location: admin.php");
    }
    
?>