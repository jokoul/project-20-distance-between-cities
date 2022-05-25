<!DOCTYPE html>
<html>
    <head>
        <title>Direction service</title>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
        <style>
            html, body{
                height: 100%;
            }
            #map{
                height: 80%;
            }
        </style>
    </head>
    <body>
        <div id="map"></div>
        <button onclick="calculateRoute()">Calculate Route</button>
        <!--I embed the script to connect to google maps API, then i add my API key retrieve from google cloud console section credential -->
        <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjILPJidCXRJGyhHcXb57by3tmEOW5zOA"
        ></script>
        <script>
                //set map options
                const myLatLng = {lat:51.5,lng:-0.1}
                var mapOptions = {
                    center: myLatLng,//to make it more readable
                    zoom: 7,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                }
                //create map
                var map = new google.maps.Map(document.getElementById('map'),mapOptions);
                //Setting the mapTypeId upon construction
                // map.setMapTypeId(google.maps.MapTypeId.SATELLITE);
                
                //Create a DirectionService object for our request
                const directionService = new google.maps.DirectionsService();

                //Create a DirectionsRenderer object which we will use to display the route
                const directionsDisplay = new google.maps.DirectionsRenderer();

                //Bind the DirectionsRenderer to the map
                directionsDisplay.setMap(map);

                //Define calculateRoute function
                function calculateRoute(){
                    const request = {
                        origin: "New York",
                        destination: "Toronto",
                        travelMode: google.maps.TravelMode.DRIVING,//WALKING,BYCYCLING,TRANSIT
                        unitSystem: google.maps.UnitSystem.METRIC//to change the unit system from Miles to Kilometers
                    }
                    //Pass the request to the route method
                    directionService.route(request,function(result,status){
                        if(status == google.maps.DirectionsStatus.OK){
                            console.log(result);
                            //Get distance and time
                            window.alert("The travelling distance is " + result.routes[0].legs[0].distance.text + ".<br/> The travelling time is: " + result.routes[0].legs[0].duration.text + ".");
                            //display route
                            directionsDisplay.setDirections(result);
                        }
                    })
                }
        </script>
    </body>
</html>