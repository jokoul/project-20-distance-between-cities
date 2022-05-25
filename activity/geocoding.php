<!DOCTYPE html>
<html>
    <head>
        <title>Geocoding using Google maps Javascript API</title>
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
        <input type="text" placeholder="Address" id="address">
        <button onclick="geocodeAddress();">Geocode Address</button>
        <!--EMBED GOOGLE MAP API WITH API KEY-->
         <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjILPJidCXRJGyhHcXb57by3tmEOW5zOA"></script>
         <script>
             //set map options
             const myLatLng = {lat:51.5,lng:-0.1}
             const mapOptions = {
                 center: myLatLng,
                 zoom: 7,
                 mapTypeId: google.maps.MapTypeId.ROADMAP,
             };
             //create map
             const map = new google.maps.Map(document.getElementById('map'),mapOptions);

             //Create a geocoder object to use the geocode method
             const geocoder = new google.maps.Geocoder();

             //create geocode function
             function geocodeAddress(){
                geocoder.geocode({'address': document.getElementById('address').value},function(results,status){
                    if(status == google.maps.GeocoderStatus.OK){
                        // console.log(results)
                        alert("Address coordinates: " + results[0].geometry.location);
                        //center the map on the result
                        map.setCenter(results[0].geometry.location);
                        //create a marker on the result position
                        const marker = new google.maps.Marker({
                            map: map,
                            position: results[0].geometry.location
                        })
                    }else{
                        window.alert("Geocode not successful: " + status)
                    }
                })
             }
         </script>
    </body>
</html>