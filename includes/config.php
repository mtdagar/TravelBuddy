<?php

	$servername = "localhost";
	$username = "root";
	$password = "123456";
	$dbname = "travelbuddy";


	ob_start();


	$timezone = date_default_timezone_set("Asia/Kolkata");

	$con = mysqli_connect($servername, $username, $password, $dbname);

	if(mysqli_connect_errno()) {
		echo "Failed to connect: " . mysqli_connect_errno();
	}
?>
