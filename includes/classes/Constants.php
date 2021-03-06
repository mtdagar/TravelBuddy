<?php
class Constants {

	//Register error messages	
	public static $registrationFailed = "Fatal Error!";
	public static $passwordNotAlphanumeric = "Your password can only contain numbers and letters.";
	public static $passwordCharacters = "Your password must be between 5 and 30 characters.";
	public static $emailInvalid = "Email is invalid.";
	public static $lastNameCharacters = "Your last name must be between 2 and 25 characters.";
	public static $firstNameCharacters = "Your first name must be between 2 and 25 characters.";
	public static $startLocationCharacters = "Your starting location must be between 2 and 100 characters.";
	public static $endLocationCharacters = "Your destination location must be between 2 and 100 characters.";
	public static $bioCharacters = "Your bio must be less than 500 characters.";
	public static $emailTaken = "This email is already associated with an account.";

	//Login error messages
	public static $loginRequired = "You must be logged in to visit this page.";
	public static $loginFailed = "Your email or password is incorrect.";
}
?>