<!DOCTYPE html>
<html>
    <head>
        <title>Geocoding : format Address and get postcode</title>
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
        <button onclick="geocodeAddress()">Geocode Address</button>
        <div id="output"></div>
        <!--EMBED GOOGLE MAP API WITH API KEY-->
         <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjILPJidCXRJGyhHcXb57by3tmEOW5zOA"></script>
         <!--JQUERY CDN-->
         <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
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
             //Define marker
             var marker;
             //create geocode function
             function geocodeAddress(){
                 //our request url containing the value of user input
                var url = "https://maps.googleapis.com/maps/api/geocode/json?address=" + document.getElementById('address').value + "&key=AIzaSyCjILPJidCXRJGyhHcXb57by3tmEOW5zOA";
                //window.open(url);//open() create a new navigation tab and load in the ressource pass as parameter
                //getJSON() load JSON-encoded data from the server using a get HTTP request
                $.getJSON(url, function(data){
                    if(data.status == "OK"){
                        var formattedAddress = data.results[0].formatted_address;
                        var latitude = data.results[0].geometry.location.lat;
                        var longitude = data.results[0].geometry.location.lng;
                        var postcode="";
                        //we loop through an array of object to find the element with types property equal to postal_code then we do some action on this specific element
                        $.each(data.results[0].address_components, function(index,element){
                            if(element.types == 'postal_code'){
                                postcode = element.long_name;
                                return false;//to stop the loop
                            }
                        })
                        // console.log(postcode)
                        $('#output').html("<b>Formatted Address:</b> " + formattedAddress + "<br> <b>Coordinates:</b> (lat: " + latitude + ", lng: " + longitude + ").<br><b>Postcode:</b> " + postcode + ".");
                        //center map
                        map.setCenter({
                            lat: latitude,
                            lng:longitude,
                        })
                        //change zoom level
                        map.setZoom(14);
                        //Check if marker is already on the map, delete it
                        if(marker != undefined){
                            marker.setMap(null);//to delete a marker and keep always only one marker on the map.
                        }
                        //create a marker
                        marker = new google.maps.Marker({
                            map:map,//the marker have to be shown on our map
                            position: {lat:latitude,lng:longitude},//set the position with the same geo coordinate object used earlier
                            animation: google.maps.Animation.DROP//set an animation
                        })
                    }
                }).fail(function(){
                    $("#output").html('Request unsuccessful')
                        // const output = document.getElementById('output');
                        // output.innerHTML = "Request unsuccessful";
                })
             }
         </script>
    </body>
</html>