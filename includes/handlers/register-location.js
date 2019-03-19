//Google autocomplete magic
//--------------------------------------------------------------------------
var startLocationField, endLocationField;

var directionsService = new google.maps.DirectionsService;
var directionsDisplay = new google.maps.DirectionsRenderer;

function initAutocomplete() {
  // Create the autocomplete object, restricting the search predictions to
  // geographical location types.
  startLocationField = new google.maps.places.Autocomplete(
      document.getElementById('startLocation'), {types: ['geocode']});

  endLocationField = new google.maps.places.Autocomplete(
      document.getElementById('endLocation'), {types: ['geocode']});
}


function calculateAndDisplayRoute(){
  var origin = document.getElementById('startLocation').value,
  destination = document.getElementById('endLocation').value;
  directionsService.route({
      origin: document.getElementById('startLocation').value,
      destination: document.getElementById('endLocation').value,
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

          console.log(coordinates[0][0]);

          post(coordinates, origin, destination);

        } else {
          window.alert('Directions request failed due to ' + status);
        }
      }
  );
}

function post(coordinates, origin, destination) {

  $.post("", {
    endloc : destination,
    sloc : origin,
    routes  : coordinates,
    storeRoute : 1,
  }, function (response) {
    if(response == 'true' || response == '1') {
      window.location = 'registerBio.php';
    }
    else {
      alert("Some error occureed");
    }
  });
}

//function calls
//--------------------------------------------------------------------------
initAutocomplete();
