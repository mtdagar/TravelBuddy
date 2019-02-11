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


//function calls 
//--------------------------------------------------------------------------
initAutocomplete();