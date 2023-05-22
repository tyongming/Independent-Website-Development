<?php
 header('Content-Type: text/html; charset=utf-8');


if(isset($_POST["sublist"])){

	require_once '../db.php';

	require_once '../include/addabyss_function.php';
	$sqlcheck="SELECT * FROM settings WHERE setid=1;";
    $resultcheck = mysqli_query($conn, $sqlcheck);
    $rowcheck = mysqli_fetch_assoc($resultcheck);

    $fscheck=$rowcheck['formswitch'];
    $uscheck=$rowcheck['upstart'];
    $uecheck=$rowcheck['upend'];
    $dscheck=$rowcheck['downstart'];
    $decheck=$rowcheck['downend'];

	$yearr = date("Y");
    $monthr = date("m"); 
    $dayr = date("d");
	if($dayr<16){
		$datea=1;
		$dateb=15;
		if($dayr<$uscheck){
			header("location: ../abyss/abyss.php?error=regclosed");
	
			exit();
		}

		if($dayr>$uecheck){
			header("location: ../abyss/abyss.php?error=regclosed");
	
			exit();
		}

	}else{
		$datea=16;
		$dateb=30;
		if($dayr<$dscheck){
			header("location: ../abyss/abyss.php?error=regclosed");
	
			exit();
		}

		if($day>$decheck){
			header("location: ../abyss/abyss.php?error=regclosed");
	
			exit();
		}

	}

	

	mysqli_query("SET character_set_client=utf8", $conn);
	mysqli_query("SET character_set_connection=utf8", $conn);


	$dcid = $_POST["dc_id"];

    $giid = $_POST["gi_id"];

	$giserver = $_POST["giserver"];

	$world = $_POST["world"];

	$giname = $_POST["gi_name"];

	$lastabyss = $_POST["last_abyss"];

	$floor = $_POST["floor"];

	$room = $_POST["room"];

	$half = $_POST["half"];

	$qcreapeat="SELECT * FROM abyss WHERE (create_date BETWEEN '$yearr-$monthr-$datea' AND '$yearr-$monthr-$dateb') AND dc_id='$dcid';";
	$creapeat = mysqli_query($conn, $qcreapeat);
	$chckrepeat = mysqli_num_rows($creapeat);

	

	if(emptyInputAdd($dcid,$giid,$giserver,$floor) !== false){

		header("location: ../abyss/abyss.php?error=emptyinput");

		exit();

	}	
	
	
	if(!$chckrepeat<1){
		header("location: ../abyss/abyss.php?error=repeatinput");
	
		exit();
	}

	if(!$fscheck =="checked"){
        header("location: ../abyss/abyss.php?error=regclosed");
	
		exit();
    }

	
	createMed($conn,$dcid,$giid,$giserver,$world,$giname,$lastabyss,$floor,$room,$half);
}

else{

	header("location: ../abyss/abyss.php");

	exit();

}