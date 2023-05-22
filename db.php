<?php 



$server = "localhost";

$username = "genshindc_genshi";

$password = "TLr7LwH0YrOcw";

$dbname = "genshindc_genshi";





$conn = mysqli_connect($server, $username,$password,$dbname);
mysqli_query("SET character_set_results=utf8", $conn);
mb_language('uni'); 
mb_internal_encoding('UTF-8');
mysqli_query("set names 'utf8'",$conn);



if(!$conn){

    die("Connection Failed:".mysqli_connect_error());

}



?>