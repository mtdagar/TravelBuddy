<?php

function sanitizeText($inputText){
	$inputText = strip_tags($inputText);
	return $inputText;
}


if(isset(($_POST['registerButton']))){
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


	$wasSuccessful = $account->register($firstName, $lastName, $email, $password);

	if($wasSuccessful) {
		header("Location: index.php");
	}
}



?>