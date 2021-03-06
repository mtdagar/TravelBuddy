<?php

	include("includes/config.php");
	include("includes/classes/Account.php");
	include("includes/classes/Constants.php");

	$account = new Account($con);

	include("includes/handlers/login-handler.php");
	include("includes/handlers/register-handler.php");

	function getInputValue($name) {
		if(isset($_POST[$name])) {
			echo $_POST[$name];
		}
	}

?>

<html>

<head>

	<title>Welcome to Travel Buddy</title>

	<!-- Bootstrap CDN -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">

	<!-- Custom Stylesheet -->
	<link href="assets/css/register.css" rel="stylesheet">

</head>


<body>

	<!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg transparent navbar-dark fixed-top">
       	<a class="navbar-brand" href="index.php"><img src="assets/icons/logo.png" alt="travelBuddy"></a>
       	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
   		    <span class="navbar-toggler-icon"></span>
       	</button>
       	<div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto" id="navList">
              <li class="nav-item active" id="loginLinkItem">
                <a class="nav-link" id="loginLink" href="login.php">LOGIN</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="aboutLink" href="#">ABOUT<span class="sr-only">(current)</span></a>
              </li>

            </ul>
       	</div>
    </nav>



    <!-- progressbar -->
	<ul id="progressbar">
		<li class="active"></li>
		<li></li>
		<li></li>
	</ul>


    <!-- Form -->
    <form id="registerForm" action="register.php" method="POST">

    	<!-- Step 1 -->
    	<div class="container form-container">

			<h2>Create an account</h2>

			  <div class="form-row" style="padding-top: 20px; padding-bottom: 20px">
			    <div class="form-group col-md-6">
			      <input id="firstName" name="firstName" type="text" class="form-control margin-bottom" placeholder="First name" value="<?php getInputValue('firstName') ?>" required>
			    </div>
			    <div class="form-group col-md-6">
			      <input id="lastName" name="lastName" type="text" class="form-control margin-bottom" placeholder="Last name" value="<?php getInputValue('lastName') ?>" required>
			    </div>
			  </div>

			  <div class="form-group" style="padding-bottom: 20px">
			  	<input id="email" name="email" type="text" class="form-control margin-bottom" placeholder="Email" value="<?php getInputValue('email') ?>" required>
			  </div>

			  <div class="form-group" style="padding-bottom: 10px">
			    <input id="password" name="password" type="password" class="form-control margin-bottom" placeholder="Password" required>
			  </div>

			  <p>
			  	<ul class="errorList" style="margin-bottom: 20px">
			  		<li><?php echo $account->getError(Constants::$firstNameCharacters); ?></li>
			  		<li><?php echo $account->getError(Constants::$lastNameCharacters); ?></li>
			  		<li><?php echo $account->getError(Constants::$emailInvalid); ?></li>
			  		<li><?php echo $account->getError(Constants::$emailTaken); ?></li>
			  		<li><?php echo $account->getError(Constants::$passwordNotAlphanumeric); ?></li>
			  		<li><?php echo $account->getError(Constants::$passwordCharacters); ?></li>
			  	</ul>
			  </p>

			  <button type="submit" name ="registerButton" class="btn btn-primary">Sign up</button>

		</div>




	</form>




	<!-- jQuery -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>
	

</body>

</html>
