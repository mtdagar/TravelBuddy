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
<!-- Google Maps API -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyARMwFdkCA_ALFvh9aFuJfixwCoinGoXbQ&libraries=places"></script>


<script type="text/javascript">
  var userdata = jQuery.parseJSON('<?= $userdata ?>');
  //console.log(userdata);
</script>


<script type="text/javascript">

  var directionsService = new google.maps.DirectionsService;

  function calculateRoute(directionsService){
    directionsService.route({
        origin: userdata[1],
        destination: userdata[2],
        travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {

            //JSON like objects containing coordinates
            var routeCoordinates = response.routes[0].overview_path;
						coordinates = [];

						//push lats and longs from route to a simple 2d array
						routeCoordinates.forEach(function(val){
							coordinates.unshift([val.lat(), val.lng()]);
						});

						console.log(coordinates);

          } else {
            window.alert('Directions request failed due to ' + status);
          }
        }
    );
  }

  calculateRoute(directionsService);

</script>
