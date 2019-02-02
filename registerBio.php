<?php

	include("includes/config.php");
	include("includes/classes/Account.php");
	include("includes/classes/Constants.php");

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
		<li class="active"></li>
		<li class="active"></li>
	</ul>


    <!-- Form -->
    <form id="registerLocation" action="registerLocation.php" method="POST">

    	<!-- Step 1 -->
    	<div class="container form-container">

			<h3>Something about yourself</h3>

			  <div class="form-group" style="padding-top: 20px; padding-bottom: 20px">
			    <textarea class="form-control" id="bio" rows="3" value="<?php getInputValue('bio') ?>"></textarea>
			  </div>

			  <p>
			  	<ul class="errorList" style="margin-bottom: 20px">
			  		<li><?php echo $account->getError(Constants::$bioCharacters); ?></li>
			  	</ul>
			  </p>

			  <button type="submit" name ="registerBioButton" class="btn btn-primary">Save</button>
		</div>
			  			
	</form>



	<!-- jQuery -->
  	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>
	

	<?php

	  if(isset($_SESSION['userLoggedIn']) && !empty($_SESSION['userLoggedIn'])) {
	    echo "<script src='includes/handlers/nav-links.js' type='text/javascript'></script>";
	  }

	?>

</body>

</html>
