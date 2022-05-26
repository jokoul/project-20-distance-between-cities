//Set map options
const myLatLng = { lat: 45.764043, lng: 4.835659 }; //geographic coordinates
const mapOptions = {
  center: myLatLng,
  zoom: 7,
  mapTypeId: google.maps.MapTypeId.ROADMAP,
};
//create map
const map = new google.maps.Map(document.getElementById("map"), mapOptions); //The div containing our map must have always the same id "map" to run fine

//Create a DirectionsService object to use the route method and get a result for our request
const directionsService = new google.maps.DirectionsService();
//Create a DirectionsRenderer object which we will use to display the route
const directionsDisplay = new google.maps.DirectionsRenderer();
//Bind the directionsRenderer to the map
directionsDisplay.setMap(map);
//select Travelling mode
// const selectedmode = document.getElementById("mode").value;
//Submit the form
const submitBtn = document.getElementById("submitBtn");
submitBtn.addEventListener("click", () => {
  calculateRoute();
});
//Define calculateRoute function
function calculateRoute() {
  //select Travelling mode
  const selectedMode = document.getElementById("mode").value;
  console.log(selectedMode);
  //Create request
  const request = {
    origin: document.getElementById("from").value, //User inputs from fields
    destination: document.getElementById("to").value,
    travelMode: google.maps.TravelMode[selectedMode], //WALKING, BYCYCLING, TRANSIT
    unitSystem: google.maps.UnitSystem.METRIC, //to change Miles to kilometers. To put in miles, use "IMPERIAL"
  };
  console.log(request);
  //Pass the request to the route method
  directionsService.route(request, function (result, status) {
    console.log(result);
    const output = document.getElementById("output");
    if (status == google.maps.DirectionsStatus.OK) {
      //Get the distance and time
      console.log(output);
      output.innerHTML =
        "<div class='alert alert-info'>From: " +
        document.getElementById("from").value +
        ".<br>To: " +
        document.getElementById("to").value +
        ".<br>Driving distance: " +
        result.routes[0].legs[0].distance.text +
        ".<br>Duration: " +
        result.routes[0].legs[0].duration.text +
        ".</div>";

      //Display route
      directionsDisplay.setDirections(result);
    } else {
      //Delete route form map
      directionsDisplay.setDirections({
        routes: [],
      });
      //Center map in Lyon
      map.setCenter(myLatLng);
      //Show error message
      output.innerHTML =
        "<div class='alert alert-danger'>Could not retrieve travelling information.</div>";
    }
  });
}
//Create autocomplete objects for all inputs. WARNING, before using method below, we need to add the library "places" inside our embed maps api script.
const inputFrom = document.getElementById("from");
const inputTo = document.getElementById("to");
//define options
// const options = {
//   types: ["address"],
// };
const autocompleteFrom = new google.maps.places.Autocomplete(
  inputFrom
  /*, options*/
);
const autocompleteTo = new google.maps.places.Autocomplete(
  inputTo /*, options*/
);
//Change logo
document.getElementById("mode").addEventListener("change", () => {
  let selectValue = document.getElementById("mode").value;
  console.log(selectValue);
  const label = document.getElementById("labelLogo");
  switch (selectValue) {
    case "DRIVING":
      label.innerHTML = '<i class="fas fa-car"></i></i>';
      break;
    case "WALKING":
      label.innerHTML = '<i class="fas fa-person-walking"></i>';
      break;
    case "BICYCLING":
      label.innerHTML = '<i class="fas fa-person-biking"></i>';
      break;
    case "TRANSIT":
      label.innerHTML = '<i class="fas fa-train-subway"></i>';
      break;
  }
});
