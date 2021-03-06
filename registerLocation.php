<?php

	include("includes/config.php");
	include("includes/classes/Account.php");
	include("includes/classes/Constants.php");
	include("includes/handlers/login-handler.php");

	$GLOBALS['coordinates'] = [];

	if(isset($_SESSION['userLoggedIn'])){
		$userLoggedIn = $_SESSION['userLoggedIn'];
	}else{
		$message = Constants::$loginRequired;

		echo("<script>
			alert('$message');
			window.location.href='login.php';
		</script>");
	}


	$account = new Account($con);
	$userLoggedIn = $_SESSION['userLoggedIn'];

	include("includes/handlers/register-handler.php");
	include("includes/handlers/commute-handler.php");

	function getInputValue($name) {
		if(isset($_POST[$name])) {
			echo $_POST[$name];
		}
	}

	function getFirstName($em){
	    $sql = "SELECT firstName FROM users WHERE email='$em' limit 1";
	    $result = mysqli_query($GLOBALS['con'], $sql);
	    $value = mysqli_fetch_object($result);
	    return $value->firstName;
	}
?>

<html>

<head>

	<title>Welcome to Travel Buddy</title>

	<!-- Bootstrap CDN -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">

	<!-- Google Maps API -->
  	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyARMwFdkCA_ALFvh9aFuJfixwCoinGoXbQ&libraries=places"></script>

	<!-- Custom Stylesheet -->
	<link href="assets/css/register.css" rel="stylesheet">

</head>


<body>

	<!-- Bootstrap 4 dependencies -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

	<!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg transparent navbar-dark fixed-top">
       	<a class="navbar-brand" href="index.php"><img src="assets/icons/logo.png" alt="travelBuddy"></a>
       	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
   		    <span class="navbar-toggler-icon"></span>
       	</button>
       	<div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto" id="navList">

              <?php if(isset($_SESSION['userLoggedIn']) && !empty($_SESSION['userLoggedIn'])) : ?>

                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo getFirstName($_SESSION['userLoggedIn']) ?>
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Your profile</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="includes/classes/Logout.php">Sign out</a>
                  </div>
                </li>

              <?php else : ?>

                <li class="nav-item" id="loginLinkItem">
                  <a class="nav-link" id="loginLink" href="login.php">Login</a>
                </li>

              <?php endif; ?>

              <li class="nav-item">
                <a class="nav-link" id="aboutLink" href="#">About<span class="sr-only">(current)</span></a>
              </li>

            </ul>
       	</div>
    </nav>



    <!-- progressbar -->
	<ul id="progressbar">
		<li class="active"></li>
		<li class="active"></li>
		<li></li>
	</ul>


    <!-- Form -->
    <form id="registerLocation" action="registerLocation.php" method="POST">

    	<!-- Step 2 -->
    	<div class="container form-container">

			<h2>How do you commute?</h2>

			  <div class="form-group" style="padding-top: 20px; padding-bottom: 20px">
			    <input name="startLocation" id="startLocation" type="text" class="form-control margin-bottom" placeholder="Starting point" value="<?php getInputValue('startLocation') ?>">
			  </div>
			  <div class="form-group" style="padding-bottom: 20px">
			    <input name="endLocation" id="endLocation" type="text" class="form-control margin-bottom" placeholder="Destination" value="<?php getInputValue('endLocation') ?>">
			  </div>

			  <p>
			  	<ul class="errorList" style="margin-bottom: 20px">
			  		<li><?php echo $account->getError(Constants::$startLocationCharacters); ?></li>
			  		<li><?php echo $account->getError(Constants::$endLocationCharacters); ?></li>
			  	</ul>
			  </p>

			  <button type="button" name ="registerLocationBtn" class="btn btn-primary" onclick="calculateAndDisplayRoute()">Set Commute</button>
		</div>

	</form>

	<!-- Custom JS for Main Page -->
  <script type="text/javascript" src="includes/handlers/register-location.js"></script>

	<!-- jQuery -->
	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>

</body>

</html>
