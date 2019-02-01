//----------------------------------------------------------------------------------------------------------
												  //Variables used
//----------------------------------------------------------------------------------------------------------
	//start and end point coordinates obtained from registration page
	var xs= {lat: 28.7041, lng: 77.1025},
		  xe= {lat: 28.4595, lng: 77.0266},
			ys= {lat: 28.720459926425686, lng: 77.06609829069782}
			ye= {lat: 28.63545040536429, lng: 77.09682233886724};

		
	var platform = new H.service.Platform({
		'app_id': 'RGqajGPjg7Rq21YzcF7V', 
	  'app_code': 'OmWPbo_ai_qFr8ONOLEDZg'
	});
	var maptypes = platform.createDefaultLayers();
	var map = new H.Map(document.getElementById('mapContainer'),maptypes.terrain.map,
	{
	  zoom: 11,
	  center: {lat: (xs.lat+xe.lat)/2, lng: (xs.lng+xe.lng)/2}
	});
	var ui = H.ui.UI.createDefault(map, maptypes);
	var mapEvents = new H.mapevents.MapEvents(map);
	var behavior = new H.mapevents.Behavior(mapEvents);
	var router = platform.getRoutingService();
	var starticon = new H.map.Icon('assets/icons/startmarker.png');
	var endicon = new H.map.Icon('assets/icons/endmarker.png');  
	var rstarticon = new H.map.Icon('assets/icons/routestartmarker.png');
	var rendicon = new H.map.Icon('assets/icons/routeendmarker.png');

//----------------------------------------------------------------------------------------------------------
												  //Address to coordinates
//----------------------------------------------------------------------------------------------------------
/*	function geocode(platform) {
	  var geocoder = platform.getGeocodingService(),
	    geocodingParameters = {
	      searchText: 'New Delhi',
	      jsonattributes : 1
	    };

	  geocoder.geocode(
	    geocodingParameters,
	    onSuccess,
	    onError
	  	);
	  function onSuccess(result) {
	  var locations = result.response.view[0].result;
	  addLocationsToMap(locations);
  	addLocationsToPanel(locations);
		}
		
		function onError(error) {
  		alert('Ooops!');
	}
*/
//----------------------------------------------------------------------------------------------------------
												  //Adding markers
//----------------------------------------------------------------------------------------------------------
	function addDraggableMarkers(map, behavior,start_0,end_0,start_1, end_1){

		var startmarker0 = new H.map.Marker(start_0, {icon: starticon});
	  startmarker0.draggable = true;
	  map.addObject(startmarker0);
			
	  var endmarker0 = new H.map.Marker(end_0, {icon: endicon});
	  endmarker0.draggable = true;
	  map.addObject(endmarker0);

	  var startmarker1 = new H.map.Marker(start_1, {icon: starticon});
		map.addObject(startmarker1);

		var endmarker1 = new H.map.Marker(end_1, {icon: endicon});
		map.addObject(endmarker1);

		  
	  map.addEventListener('dragstart', function(ev) {
		var target = ev.target;
		if (target instanceof H.map.Marker) {
		  behavior.disable();
			}
		}, false);
	  // re-enable the default draggability of the underlying map
	  // when dragging has completed
	  map.addEventListener('dragend', function(ev) {
		var target = ev.target;
		if (target instanceof mapsjs.map.Marker) {
		  behavior.enable();
		}
	  }, false);

	  // Listen to the drag event and move the position of the marker
	  // as necessary
	  map.addEventListener('drag', function(ev) {
		var target = ev.target,
			pointer = ev.currentPointer;
		if (target instanceof mapsjs.map.Marker) {
		  target.setPosition(map.screenToGeo(pointer.viewportX, pointer.viewportY));
		  if(target == startmarker0)
			xs=map.screenToGeo(pointer.viewportX, pointer.viewportY);
		  else if(target == endmarker0)
			xe=map.screenToGeo(pointer.viewportX, pointer.viewportY);
		}
	  }, false);
	}

//----------------------------------------------------------------------------------------------------------
												  //Finding the route between the markers
//----------------------------------------------------------------------------------------------------------
	function findroute(start_0, end_0, start_1, end_1){
	  
	  var routingParameters0 = {
		'mode': 'fastest;car',
		'waypoint0': start_0.lat+','+start_0.lng,
		'waypoint1': end_0.lat+','+end_0.lng,
		'representation': 'display',
		'routeattributes': 'summary'
	  };

	  // Define a callback function to process the routing response:
	  var onResult = function(result) {
			
			var route,
			routeShape,
		  startPoint,
		  endPoint,
		  linestring;

			if(result.response.route) {
				// Pick the first route from the response:
				route = result.response.route[0];
				// Pick the route's shape:
				routeShape = route.shape;

				// Create a linestring to use as a point source for the route line
				linestring = new H.geo.LineString();

				// Push all the points in the shape into the linestring:
				routeShape.forEach(function(point) {
				  var parts = point.split(',');
				  linestring.pushLatLngAlt(parts[0], parts[1]);  
				});

				// Create a polyline to display the route:
				var routeLine = new H.map.Polyline(linestring, {
				  style: { strokeColor: 'rgba(253, 151, 114, 1)', lineWidth: 4 }
				});

				var startMarker = new H.map.Marker(start_0, {icon: rstarticon});
				var endMarker = new H.map.Marker(end_0, {icon: rendicon});

				// Add the route polyline and the two markers to the map:
				map.addObjects([routeLine, startMarker, endMarker]);
				// Set the map's viewport to make the whole route visible:
				map.setViewBounds(routeLine.getBounds());


				//Printing route distance
				//console.log("Route 0 distance : " + route.summary.distance + "m");
			}
		};

	  // Get an instance of the routing service:
	  var router = platform.getRoutingService();

	  // Call calculateRoute() with the routing parameters,
	  // the callback and an error callback function (called if a
	  // communication error occurs):
	  router.calculateRoute(routingParameters0, onResult,
		function(error) {
		  alert(error.message);
		});
	}

//----------------------------------------------------------------------------------------------------------
													//Function Calls
//----------------------------------------------------------------------------------------------------------
	
	addDraggableMarkers(map,behavior,xs,xe,ys,ye);
	
	var buttonRef = document.getElementById("setLocationBtn");
	buttonRef.addEventListener("click", function() {
	   findroute(xs,xe,ys,ye); 
	}, false);