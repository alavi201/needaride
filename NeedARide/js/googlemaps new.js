var x=document.getElementById("demo");
			window.onload=  function getLocation()
			  {
			  if (navigator.geolocation)
			    {
			    navigator.geolocation.getCurrentPosition(showPosition,showError);
			    }
			  else{x.innerHTML="Geolocation is not supported by this browser.";}
			  }
			
			function showPosition(position)
			  {
			  lat=position.coords.latitude;
			  lon=position.coords.longitude;
			  latlon=new google.maps.LatLng(lat, lon)
			  mapholder=document.getElementById('mapholder')
			  mapholder.style.height='400px';
			  mapholder.style.width='500px';
			
			  var myOptions={
			  center:latlon,zoom:14,
			  mapTypeId:google.maps.MapTypeId.ROADMAP,
			  mapTypeControl:false,
			  navigationControlOptions:{style:google.maps.NavigationControlStyle.SMALL}
			  
			  };
			   map=new google.maps.Map(document.getElementById("mapholder"),myOptions);
			  
			  // google.maps.event.addListener(map, 'click', function(event) {
			  //  placeMarker(event.latLng);
			  //});
			  var marker=new google.maps.Marker({position:'Saddar karachi',map:map,title:"You are here!"});
			  }
			  
			  
			
			function showError(error)
			  {
			  switch(error.code) 
			    {
			    case error.PERMISSION_DENIED:
			      x.innerHTML="User denied the request for Geolocation."
			      break;
			    case error.POSITION_UNAVAILABLE:
			      x.innerHTML="Location information is unavailable."
			      break;
			    case error.TIMEOUT:
			      x.innerHTML="The request to get user location timed out."
			      break;
			    case error.UNKNOWN_ERROR:
			      x.innerHTML="An unknown error occurred."
			      break;
			    }
			  }
			
			 function placeMarker(location) {
			  var marker = new google.maps.Marker({
			    position: location,
			    map: map
			  });
			  var name = 1234;
			  var nic =4567;
			  
			  var infowindow = new google.maps.InfoWindow({
			    content: 'Latitude: ' + location.lat() + '<br>Longitude: ' + location.lng()
					
			  });
			  infowindow.open(map,marker);
			  }
