<?php

header('Content-Type: text/html; charset=utf-8');

function emptyInputAdd($dcid,$giid,$giserver,$floor){

	$result;

	if(empty($dcid)|| empty($giid) || empty($giserver) || empty($floor)){

		$result = true;

	}

	else{

		$result = false;

	}

	return $result;

}











function createMed($conn,$dcid,$giid,$giserver,$world,$giname,$lastabyss,$floor,$room,$half){	
			

			$sql = "INSERT INTO abyss (abyss_id, dc_id, gi_id, giserver, world, gi_name, last_abyss, floor, room, half, help_id, help_stat, create_date) 

			VALUES (DEFAULT, '$dcid', '$giid', '$giserver', '$world', '$giname', '$lastabyss', '$floor', '$room', '$half', '无', 'Pending', DATE_ADD(now() , INTERVAL 12 HOUR));";

			
			$result2 = mysqli_query($conn, $sql);

			$sqlbot = "INSERT INTO botmessage (abyss_id, dc_id, gi_id, giserver, world, gi_name, last_abyss, floor, room, half, help_id, help_stat, create_date) 

			VALUES (DEFAULT, '$dcid', '$giid', '$giserver', '$world', '$giname', '$lastabyss', '$floor', '$room', '$half', '无', 'Pending', DATE_ADD(now() , INTERVAL 12 HOUR));";
			
			$resultbot = mysqli_query($conn, $sqlbot);

			$sqlconvert = "UPDATE botmessage SET 
			dc_id = CONVERT(BINARY(CONVERT(dc_id USING latin1)) USING utf8mb4), 
			giserver = CONVERT(BINARY(CONVERT(giserver USING latin1)) USING utf8mb4),
			world = CONVERT(BINARY(CONVERT(world USING latin1)) USING utf8mb4),
			gi_name = CONVERT(BINARY(CONVERT(gi_name USING latin1)) USING utf8mb4),
			last_abyss = CONVERT(BINARY(CONVERT(last_abyss USING latin1)) USING utf8mb4),
			half = CONVERT(BINARY(CONVERT(half USING latin1)) USING utf8mb4),
			help_id = CONVERT(BINARY(CONVERT(help_id USING latin1)) USING utf8mb4)
			ORDER BY abyss_id DESC LIMIT 1;";

			$resultconvert = mysqli_query($conn, $sqlconvert);

			

			header("location: ../abyss/abyss.php?error=none");

			exit();

}