//jQuery for sliding sidebar
$('.sidebtn').click(function(){
	$('.sidebar').toggleClass('active');
	$('.sidebtn').toggleClass('active');
});

$('.sidebar').toggleClass('active');



//Google autocomplete magic
//--------------------------------------------------------------------------
var startLocationField, endLocationField;

function initAutocomplete() {
  // Create the autocomplete object, restricting the search predictions to
  // geographical location types.
  startLocationField = new google.maps.places.Autocomplete(
      document.getElementById('startLocation'), {types: ['geocode']});

  endLocationField = new google.maps.places.Autocomplete(
      document.getElementById('endLocation'), {types: ['geocode']});
}

function getRoutes(coordinates) {
	$.post("", { getRoutes : true}, function (response) {
		if(typeof response != 'object' ){
			response = JSON.parse(response);
		}

		calculateCommon(coordinates, response);
	});
}


function calculateCommon(coordinates, response){

	console.log(coordinates);
	console.log(JSON.parse(response[0][1]));

	






/*
	for(var i=0;i<response.length;i++) {
		var row = response[i];
		if(row[1] == '') {
			continue;
		}

		var route = JSON.parse(row[1]);
		console.log(route);
	}
*/
}


//function calls
//--------------------------------------------------------------------------
initAutocomplete();
