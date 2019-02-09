<?php
  
  	include("includes/config.php");
  	include("includes/classes/Constants.php");

  	if(isset($_SESSION['userLoggedIn'])){
    //if user logged in
    $userLoggedIn = $_SESSION['userLoggedIn'];
  	}else{
		$message = Constants::$loginRequired;
	
		echo("<script>
			alert('$message');
			window.location.href='login.php';
		</script>");
  	}

  	function getFirstName($em){
    	$sql = "SELECT firstName FROM users WHERE email='$em' limit 1";
    	$result = mysqli_query($GLOBALS['con'], $sql);
    	$value = mysqli_fetch_object($result);
    	return $value->firstName;
  	}

  	function getStartLocation($em){
  		$sql = "SELECT startLocation FROM users WHERE email='$em' limit 1";
    	$result = mysqli_query($GLOBALS['con'], $sql);
    	$value = mysqli_fetch_object($result);
    	if($value->startLocation==""){
    		return null;
    	}else{
    		return $value->startLocation;
    	}
    	
  	}

  	function getEndLocation($em){
  		$sql = "SELECT endLocation FROM users WHERE email='$em' limit 1";
    	$result = mysqli_query($GLOBALS['con'], $sql);
    	$value = mysqli_fetch_object($result);
    	return $value->endLocation;
  	}


?>

<!DOCTYPE html>

<html lang="en" >

<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="initial-scale=1.0, width=device-width"/>

	<title>TravelBuddy</title>

	<!-- Bootstrap CDN -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	
	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">

	
    <!-- Here Maps dependencies -->
    <script src="http://js.api.here.com/v3/3.0/mapsjs-core.js"
    type="text/javascript" charset="utf-8"></script>
    <script src="http://js.api.here.com/v3/3.0/mapsjs-service.js"
    type="text/javascript" charset="utf-8"></script>
    <script src="http://js.api.here.com/v3/3.0/mapsjs-mapevents.js" 
     type="text/javascript" charset="utf-8"></script>
    <script src="http://js.api.here.com/v3/3.0/mapsjs-ui.js" 
      type="text/javascript" charset="utf-8"></script>
    <link rel="stylesheet" type="text/css" 
      href="http://js.api.here.com/v3/3.0/mapsjs-ui.css" />
    

	<!-- Custom stylesheet -->
	<link rel="stylesheet" href="assets/css/main-page.css">
	<link rel="stylesheet" href="assets/css/map.css">
</head>


<body>


	<!-- MAP -->
	<div id="mapContainer"></div>



	<!-- Sidebar -->
  	<div class="sidebar">
  		
  		<div class="user-controls">

  			<a href="#" class="control-icon" id="chatIcon"><span>Chat</span></a>
  			<a href="#" class="control-icon" id="buddiesIcon"><span>Buddies</span></a>
  			<a href="#" class="control-icon" id="bellIcon"><span>Notifications</span></a>

  		</div>

  		<form class="sidebar-form">
		    <input type="text" class="form-control" id="startLocation" placeholder="Starting point" 
		    	<?php if(getStartLocation($_SESSION['userLoggedIn'])!=null) : ?>
		     		value="<?php echo getStartLocation($_SESSION['userLoggedIn']) ?>"
		     	<?php endif; ?>>

		    <input type="text" class="form-control" id="endLocation" placeholder="Destination"
		    	<?php if(getEndLocation($_SESSION['userLoggedIn'])!=null) : ?>
		     		value="<?php echo getEndLocation($_SESSION['userLoggedIn']) ?>"
		     	<?php endif; ?>>

		  	<button type="button" class="btn btn-primary" id="setLocationBtn">Submit</button>
		</form>

		<div class="sidebtn"></div>

	</div>
  

  	<script src='https://code.jquery.com/jquery-3.2.1.js'></script>

    <script type="text/javascript" src="includes/handlers/main-page.js"></script>

    <script src="includes/handlers/map.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>