<?php

	class Account {

		private $con;
		private $errorArray;

		public function __construct($con) {
			$this->con = $con;
			$this->errorArray = array();
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

		public function getError($error) {
			if(!in_array($error, $this->errorArray)) {
				$error = "";
			}
			return "<span class='errorMessage'>$error</span>";
		}

		private function insertUserDetails($fn, $ln, $em, $pw) {
			$encryptedPw = md5($pw);
			$date = date("Y-m-d");

			$result = mysqli_query($this->con, "INSERT INTO users VALUES (NULL, '$fn', '$ln', '$em', '$encryptedPw', '$date', '', '', '')");

			return $result;
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