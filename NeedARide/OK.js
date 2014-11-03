function execute(){

if (navigator.geolocation) { //Checks if browser supports geolocation
   navigator.geolocation.getCurrentPosition(function (position) {    
   
   var destination = document.getElementById("Destination");
   var latitude = position.coords.latitude;                    //users current
     var longitude = position.coords.longitude;                 //location
     var coords = new google.maps.LatLng(latitude, longitude); 
     var directionsService = new google.maps.DirectionsService();
     var panel=document.getElementById('panel');
     var directionsDisplay = new google.maps.DirectionsRenderer({'draggable':true} );

     var map = new google.maps.Map(document.getElementById('map'), {
       zoom:7,
       mapTypeId: google.maps.MapTypeId.ROADMAP
     });
/*$(document).ready(function(){ 
$("#ajax").click(function() {
   
                   $.post("save_route.php",
					{
						source:coords,
						destination:destination.value
					},
						function(data,status){
						alert("Data: " + data + "\nStatus: " + status);
						});            
			});
});
*/
 var options = {  componentRestrictions: {country: 'pk'}
};
autocomplete = new google.maps.places.Autocomplete(destination,options);
autocomplete.bindTo('bounds', map);
     directionsDisplay.setMap(map);
     //directionsDisplay.setPanel(panel);
	
	
     var request = {
       origin: coords, 
       destination: destination.value,
       travelMode: google.maps.DirectionsTravelMode.DRIVING
     };

     directionsService.route(request, function(response, status) {
       if (status == google.maps.DirectionsStatus.OK) {
         directionsDisplay.setDirections(response);
       }
     });
     
     });
     }
     }
