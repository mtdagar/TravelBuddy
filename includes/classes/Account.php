<?php

	class Account {

		private $con;

		public $errorArray;

		public function __construct($con) {
			$this->con = $con;
			$this->errorArray = array();
		}

		public function getFirstName($em){
			$sql = "SELECT firstName FROM users WHERE email='$em' limit 1";
			$result = mysqli_query($con, $sql);
			$value = mysqli_fetch_object($result);
			return $value->firstName;
		}

		public function register($fn, $ln, $em, $pw) {
			$this->validateFirstName($fn);
			$this->validateLastName($ln);
			$this->validateEmail($em);
			$this->validatePassword($pw);

			if(empty($this->errorArray)) {
				//Insert into db
				return $this->insertUserDetails($fn, $ln, $em, $pw);
			}
			else {
				return false;
			}
		}

		public function registerLocation($sl, $el, $route, $em){
			$route = json_encode($route);

			$result = mysqli_query($this->con, "UPDATE users SET startLocation='$sl', endLocation='$el', route='$route' WHERE email='$em'");

			return $result;
		}

		public function registerBio($bio, $em){

			$result = mysqli_query($this->con, "UPDATE users SET bio='$bio' WHERE email='$em'");

			return $result;
		}

		public function getError($error) {
			if(!in_array($error, $this->errorArray)) {
				$error = "";
			}
			return "<span class='errorMessage'>$error</span>";
		}

		private function insertUserDetails($fn, $ln, $em, $pw) {
			$encryptedPw = md5($pw);
			$date = date("Y-m-d");

			$result = mysqli_query($this->con, "INSERT INTO users VALUES (NULL, '$fn', '$ln', '$em', '$encryptedPw', '$date', '', '', '', '')");

			return $result;
		}

		public function getRoutes($em){

			$sql = "SELECT email, route, startLocation, endLocation FROM users WHERE email != '$em'";

			$query = mysqli_query($this->con, $sql);

			$rows = mysqli_fetch_all($query);

			return $rows;

		}


		private function validateFirstName($fn) {
			if(strlen($fn) > 25 || strlen($fn) < 2) {
				array_push($this->errorArray, Constants::$firstNameCharacters);
				return;
			}
		}

		private function validateLastName($ln) {
			if(strlen($ln) > 25 || strlen($ln) < 2) {
				array_push($this->errorArray, Constants::$lastNameCharacters);
				return;
			}
		}

		private function validateEmail($em) {

			if(!filter_var($em, FILTER_VALIDATE_EMAIL)) {
				array_push($this->errorArray, Constants::$emailInvalid);
				return;
			}

			$checkEmailQuery = mysqli_query($this->con, "SELECT email FROM users WHERE email='$em'");
			if(mysqli_num_rows($checkEmailQuery) != 0){
				array_push($this->errorArray, Constants::$emailTaken);
				return;
			}
		}

		private function validatePassword($pw) {

			if(preg_match('/[^A-Za-z0-9]/', $pw)) {
				array_push($this->errorArray, Constants::$passwordNotAlphanumeric);
				return;
			}

			if(strlen($pw) > 30 || strlen($pw) < 5) {
				array_push($this->errorArray, Constants::$passwordCharacters);
				return;
			}

		}

		private function validateStartLocation($startl) {
			if(strlen($startl) > 100 || strlen($startl) < 2) {
				array_push($this->errorArray, Constants::$startLocationCharacters);
				return;
			}
		}

		private function validateEndLocation($endl) {
			if(strlen($endl) > 100 || strlen($startl) < 2) {
				array_push($this->errorArray, Constants::$endLocationCharacters);
				return;
			}
		}

		private function validateBio($bio) {
			if(strlen($bio) > 500) {
				array_push($this->errorArray, Constants::$bioCharacters);
				return;
			}
		}


	}
?>
