<?php

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "travelbuddy";

	$userLoggedIn;

	ob_start();
	session_start();

	$timezone = date_default_timezone_set("Asia/Kolkata");

	$con = mysqli_connect($servername, $username, $password, $dbname);

	if(mysqli_connect_errno()) {
		echo "Failed to connect: " . mysqli_connect_errno();
	}

?>
