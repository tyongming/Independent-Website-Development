<?php function emptyInputAdd($upstart,$upend,$downstart,$downend){

$resultset;

if(empty($upstart)|| empty($upend) || empty($downstart) || empty($downend)){

    $resultset = true;

}

else{

    $resultset = false;

}

return $resultset;

}


function createMed($conn,$formswitch,$upstart,$upend,$downstart,$downend){	
        

        $sql8 = "UPDATE settings SET formswitch='$formswitch',upstart=$upstart,upend=$upend,downstart=$downstart,downend=$downend WHERE setid = 1;";


        $result8 = mysqli_query($conn, $sql8);

        

        header("location: ../Admin/settings.php?error=none");

        exit();

}