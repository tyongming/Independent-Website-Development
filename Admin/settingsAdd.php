<?php
if(isset($_POST["subset"])){	 

    if ($_POST['formswitch'] == 'checked'){
        $formswitch = "checked";
    }else{
        $formswitch = "";
    }

	$upstart = $_POST["up_start"];
    $upend = $_POST["up_end"];
    $downstart = $_POST["down_start"];
    $downend = $_POST["down_end"];
    

	require_once '../db.php';

	require_once '../include/addsettings_function.php';


	if(emptyInputAdd($upstart,$upend,$downstart,$downend) !== false){

		header("location: ../Admin/settings.php?error=emptysinput");

		exit();
	}	

	createMed($conn,$formswitch,$upstart,$upend,$downstart,$downend);	

}

else{

	header("location: ../Admin/settings.php");

	exit();

}