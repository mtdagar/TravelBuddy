<?php
  
  	include("../config.php");
  	include("Constants.php");



	function fetchUserData(){
	    $sql = "SELECT email, startLocation, endLocation FROM users";
	    $result = mysqli_query($GLOBALS['con'], $sql);
	    $value = mysqli_fetch_all($result);

		
		return json_encode($value[0]);
	}
	    

	$userdata = fetchUserData();



?>

<!-- jquery CDN -->
<script src='https://code.jquery.com/jquery-3.2.1.js'></script>

<script type="text/javascript">var color = jQuery.parseJSON('<?= $userdata ?>');</script>
<script type="text/javascript">console.log("color: " + color);</script>


