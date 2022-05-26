//Set map options
const myLatLng = { lat: 45.764043, lng: 4.835659 }; //geographic coordinates
const mapOptions = {
  center: myLatLng,
  zoom: 7,
  mapTypeId: google.maps.MapTypeId.ROADMAP,
};
//create map
const map = new google.maps.Map(
  document.getElementById("googleMap"),
  mapOptions
);
//Create a DirectionsService object to use the route method and get a result for our request
const directionsService = new google.maps.DirectionsService();
//Create a DirectionsRenderer object which we will use to display the route
const directionsDisplay = new google.maps.DirectionsRenderer();
//Bind the directionsRenderer to the map
directionsDisplay.setMap(map);
//Define calculateRoute function
function calculateRoute() {
  //Create request
  const request = {
    origin: document.getElementById("from").value, //User inputs from fields
    destination: document.getElementById("to").value,
  };
}
