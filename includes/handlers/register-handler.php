<?php

function sanitizeText($inputText){
	$inputText = strip_tags($inputText);
	return $inputText;
}


if(isset($_POST['registerButton'])){
	//Register button pressed

	//first name
	$firstName = sanitizeText($_POST['firstName']);
	$firstName = ucfirst(strtolower($firstName));

	//last name
	$lastName = sanitizeText($_POST['lastName']);
	$lastName = ucfirst(strtolower($lastName));

	//email
	$email = sanitizeText($_POST['email']);

	//password
	$password = sanitizeText($_POST['password']);

/*
	//startLocation
	$startLocation = sanitizeText($_POST['startLocation']);

	//endLocation
	$endLocation = sanitizeText($_POST['endLocation']);

	//endLocation
	$bio = sanitizeText($_POST['bio']);
*/

	$wasSuccessful = $account->register($firstName, $lastName, $email, $password);

	if($wasSuccessful) {
		$_SESSION['userLoggedIn'] = $email;
		//$message = "wasSuccessful";
		//echo "<script type='text/javascript'>alert('$message');</script>";
		header("Location: registerLocation.php");
	}else{
		$loginError = Constants::$registrationFailed;
    echo "<script type='text/javascript'>alert('$loginError');</script>";
	}
}

if(isset($_POST['registerLocationBtn'])){
	//RegisterLocation button pressed

	$startLocation = sanitizeText($_POST['startLocation']);

	$endLocation = sanitizeText($_POST['endLocation']);

	$email = $_SESSION['userLoggedIn'];

	$registerLocationSuccessful = $account->registerLocation($startLocation, $endLocation, $email);

	if($registerLocationSuccessful) {
		header("Location: registerBio.php");
	}else{
		$loginError = Constants::$registrationFailed;
    	echo "<script type='text/javascript'>alert('$loginError');</script>";
	}
}

if(isset($_POST['registerBioBtn'])){
	//RegisterBio button pressed

	$bio = sanitizeText($_POST['bio']);

	$email = $_SESSION['userLoggedIn'];

	$registerBioSuccessful = $account->registerBio($bio, $email);

	if($registerBioSuccessful) {
		header("Location: main.php");
	}else{
		$loginError = Constants::$registrationFailed;
    	echo "<script type='text/javascript'>alert('$loginError');</script>";
	}
}


?>
