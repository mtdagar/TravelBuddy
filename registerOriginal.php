<?php


	include("includes/config.php");
	include("includes/classes/Account.php");
	include("includes/classes/Constants.php");

	$account = new Account($con);

	include("includes/handlers/register-handler.php");
	include("includes/handlers/login-handler.php");

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
      	    <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
              	<a class="nav-link" href="login.php">LOGIN</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">ABOUT<span class="sr-only">(current)</span></a>
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
    <form id="msForm" action="register.php" method="POST">

    	<!-- Step 1 -->
		<fieldset class="container form-container">
			<h2>Create an account</h2>
			  <div class="form-row" style="padding-top: 20px; padding-bottom: 20px">
			    <div class="form-group col-md-6">
			      <input type="text" class="form-control" id="firstName" placeholder="First Name" value="<?php getInputValue('firstName') ?>">
			    </div>
			    <div class="form-group col-md-6">
			      <input type="text" class="form-control" id="lastName" placeholder="Last Name" value="<?php getInputValue('lastName') ?>">
			    </div>
			  </div>
			  <div class="form-group">
			    <input type="text" class="form-control margin-bottom" id="email" placeholder="Email" value="<?php getInputValue('email') ?>">
			  </div>
			  <div class="form-group">
			    <input type="Password" class="form-control margin-bottom" id="password" placeholder="Password">
			  </div>
			  <button type="button" name ="next" class="btn btn-primary btn-block next">Next</button>
		</fieldset>

		<!-- Step 2 -->
		<fieldset class="container form-container">
			<h2>How do you commute?</h2>
			  </div>
			  <div class="form-group" style="padding-top: 20px;">
			    <input type="text" class="form-control margin-bottom" id="startLocation" placeholder="Starting point" value="<?php getInputValue('startLocation') ?>">
			  </div>
			  <div class="form-group">
			    <input type="text" class="form-control margin-bottom" id="endLocation" placeholder="Destination" value="<?php getInputValue('endLocation') ?>">
			  </div>
			  <button type="button" name ="next" class="btn btn-primary btn-block next">Next</button>
		</fieldset>


		<!-- Step 3 -->
		<fieldset class="container form-container">
			<h3>Something about yourself</h3>

			<?php echo $account->getError(Constants::$firstNameCharacters); ?>
			<?php echo $account->getError(Constants::$lastNameCharacters); ?>
			<?php echo $account->getError(Constants::$emailInvalid); ?>
			<?php echo $account->getError(Constants::$passwordNotAlphanumeric); ?>
			<?php echo $account->getError(Constants::$passwordCharacters); ?>
			<?php echo $account->getError(Constants::$startLocationCharacters); ?>
			<?php echo $account->getError(Constants::$endLocationCharacters); ?>
			<?php echo $account->getError(Constants::$bioCharacters); ?>
			

			  <div class="form-group" style="padding-top: 20px; padding-bottom: 20px">
			    <textarea class="form-control" id="bio" rows="3" value="<?php getInputValue('bio') ?>"></textarea>
			  </div>

			  <button type="submit" name ="registerButton">Sign up</button>
			  
		</fieldset>

		
	</form>

	<!-- jQuery -->
  	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>
	
	
 	<!-- Custom js for registeration pages -->
	<script type="text/javascript" src="includes/handlers/multistep-registration-form.js"></script>

</body>

</html>
