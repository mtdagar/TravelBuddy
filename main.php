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
    die();
  	}

    include("includes/handlers/getRoutes-handler.php");

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

  <!-- Google Maps API -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyARMwFdkCA_ALFvh9aFuJfixwCoinGoXbQ&libraries=places"></script>


	<!-- Custom stylesheet -->
  <link rel="stylesheet" href="assets/css/main-page.css">
	<link rel="stylesheet" href="assets/css/map.css">
</head>


<body>

	<!-- MAP -->
	<div id="map"></div>

	<!-- Sidebar -->
  	<div class="sidebar">

  		<div class="user-controls">

  			<a href="#" class="control-icon" id="chatIcon"><span>Chat</span></a>
  			<a href="#" class="control-icon" id="buddiesIcon"><span>Buddies</span></a>
  			<a href="#" class="control-icon" id="bellIcon"><span>Notifications</span></a>
        <a href="#" class="control-icon profile-icon" id="profileIcon"><span>Profile</span></a>

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

		  	<button type="button" class="btn btn-primary" id="setLocationBtn">Find Buddies</button>
		</form>

		<div class="sidebtn"></div>

    <!-- PROFILE CARDS -->

    <div class="elements">
      <div class="titleCard first">
        <div class="info">
          <img src="assets/images/1.jpeg" alt="">
          <h1 class="buddyCount">Buddies: 15</h1>
          <h1 class="postCount">Posts: 5</h1>
        </div>
        <hr>
        <h1 id="name">Travis Taylor</h1>
        <img class="options" src="assets/icons/buddy.png" alt="">
        <img class="options" src="assets/icons/message.png" alt="">
      </div>

      <div class="titleCard">
        <div class="info">
          <img src="assets/images/2.jpeg" alt="">
          <h1 class="buddyCount">Buddies: 25</h1>
          <h1 class="postCount">Posts: 13</h1>
        </div>
        <hr>
        <h1 id="name">Kira Henderson</h1>
        <img class="options" src="assets/icons/buddy.png" alt="">
        <img class="options" src="assets/icons/message.png" alt="">
      </div>

      <div class="titleCard">
        <div class="info">
          <img src="assets/images/6.jpeg" alt="">
          <h1 class="buddyCount">Buddies: 5</h1>
          <h1 class="postCount">Posts: 1</h1>
        </div>
        <hr>
        <h1 id="name">John Briggs</h1>
        <img class="options" src="assets/icons/buddy.png" alt="">
        <img class="options" src="assets/icons/message.png" alt="">
      </div>
    </div>
	</div>

  <!-- jquery CDN -->
  <script src='https://code.jquery.com/jquery-3.2.1.js'></script>

  <!-- Custom JS for Main Page -->
  <script type="text/javascript" src="includes/handlers/main-page.js"></script>

  <!-- Custom JS for Maps -->
  <script type="text/javascript" src="includes/handlers/map.js"></script>

</body>
</html>
