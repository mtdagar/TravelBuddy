<!DOCTYPE html>
<html>
  
  <head>
    <title>Your Travel Route</title>
    <meta name="viewport" content="initial-scale=1.0, width=device-width" />
    
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
    <link href="assets/css/map.css" rel="stylesheet">
  </head>
  
  <body>
    <div id="mapContainer"></div>
    
    <script>
      //start and end point coordinates obtained from registration page
      var x= {lat: 28.7041, lng: 77.1025},
          y= {lat: 28.4595, lng: 77.0266};
      //var z=
        
      var platform = new H.service.Platform({
        'app_id': 'RGqajGPjg7Rq21YzcF7V', 
        'app_code': 'OmWPbo_ai_qFr8ONOLEDZg'
      });
      var maptypes = platform.createDefaultLayers();
      var map = new H.Map(
      document.getElementById('mapContainer'),
      maptypes.normal.map,
      {
        zoom: 11,
        center: {lat: (x.lat+y.lat)/2, lng: (x.lng+y.lng)/2}
      });

      var ui = H.ui.UI.createDefault(map, maptypes);
      var mapEvents = new H.mapevents.MapEvents(map);
      var behavior = new H.mapevents.Behavior(mapEvents);
      var router = platform.getRoutingService();

//----------------------------------------------------------------------------------------------------------
                                                  //Adding markers
//----------------------------------------------------------------------------------------------------------

      var starticon = new H.map.Icon('assets/icons/startmarker.png');
      var endicon = new H.map.Icon('assets/icons/endmarker.png');     
      
      function addDraggableMarkers(map, behavior,start,end){

        var startmarker = new H.map.Marker(start, {icon: starticon});
        startmarker.draggable = true;
        map.addObject(startmarker);
        
        var endmarker = new H.map.Marker(end, {icon: endicon});
        endmarker.draggable = true;
        map.addObject(endmarker);
      
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
            if(target == startmarker)
              x=map.screenToGeo(pointer.viewportX, pointer.viewportY);
            else if(target == endmarker)
              y=map.screenToGeo(pointer.viewportX, pointer.viewportY);
          }
        }, false);
      }


//----------------------------------------------------------------------------------------------------------
//                                        Finding the route between the markers
//----------------------------------------------------------------------------------------------------------

    function findroute(start, end){
      // Create the parameters for the routing request:
      var routingParameters = {
        // The routing mode:
        'mode': 'fastest;car',
        // The start point of the route:
        'waypoint0': start.lat+','+start.lng,

        // The end point of the route:
        //'waypoint1': '52.5309916298853,13.3846220493377',
        'waypoint1': end.lat+','+end.lng,

        // To retrieve the shape of the route we choose the route
        // representation mode 'display'
        'representation': 'display'
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

        // Retrieve the mapped positions of the requested waypoints:
        startPoint = route.waypoint[0].mappedPosition;
        endPoint = route.waypoint[1].mappedPosition;

        // Create a polyline to display the route:
        var routeLine = new H.map.Polyline(linestring, {
          style: { strokeColor: 'blue', lineWidth: 10 }
        });

        // Create a marker for the start point:
        var startMarker = new H.map.Marker({
          lat: startPoint.latitude,
          lng: startPoint.longitude
        });

        // Create a marker for the end point:
        var endMarker = new H.map.Marker({
          lat: endPoint.latitude,
          lng: endPoint.longitude
        });

        // Add the route polyline and the two markers to the map:
        map.addObjects([routeLine, startMarker, endMarker]);

        // Set the map's viewport to make the whole route visible:
        map.setViewBounds(routeLine.getBounds());
        }
      };

      // Get an instance of the routing service:
      var router = platform.getRoutingService();

      // Call calculateRoute() with the routing parameters,
      // the callback and an error callback function (called if a
      // communication error occurs):
      router.calculateRoute(routingParameters, onResult,
        function(error) {
          alert(error.message);
        });
    }




//----------------------------------------------------------------------------------------------------------
//                                               Function Calls
//----------------------------------------------------------------------------------------------------------
      addDraggableMarkers(map,behavior,x,y);  
      findroute(x,y);
    </script>
  </body>

</html> 