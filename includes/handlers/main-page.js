//jQuery for sliding sidebar
$('.sidebtn').click(function(){
	$('.sidebar').toggleClass('active');
	$('.sidebtn').toggleClass('active');
});

$('.sidebar').toggleClass('active');



//Google autocomplete magic
//--------------------------------------------------------------------------
var autocomplete, endLocationField;

var componentForm = {
  street_number: 'short_name',
  route: 'long_name',
  locality: 'long_name',
  administrative_area_level_1: 'short_name',
  country: 'long_name',
  postal_code: 'short_name'
};

function initAutocomplete() {
  // Create the autocomplete object, restricting the search predictions to
  // geographical location types.
  autocomplete = new google.maps.places.Autocomplete(
      document.getElementById('autocomplete'), {types: ['geocode']});

  // Avoid paying for data that you don't need by restricting the set of
  // place fields that are returned to just the address components.
  
}


//function calls 
//--------------------------------------------------------------------------
initAutocomplete();