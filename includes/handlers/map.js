//globals
var submitBtn = document.getElementById('setLocationBtn');



function initMap() {
	var directionsService = new google.maps.DirectionsService;
    var directionsDisplay = new google.maps.DirectionsRenderer;

    // The map, centered at Uluru
    var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 5,
          center: {lat: 20.593683, lng: 78.962883}
        });

    directionsDisplay.setMap(map);

	$("#setLocationBtn").on('click', function(){
		calculateAndDisplayRoute(directionsService, directionsDisplay);
	});
}

function calculateAndDisplayRoute(directionsService, directionsDisplay) {
    directionsService.route({
        origin: document.getElementById('startLocation').value,
        destination: document.getElementById('endLocation').value,
        travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay.setDirections(response);
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        }
    );
}

function my(){
	console.log("hi");
}

//function calls
initMap();
