<?php require_once("constants.php");
session_start();
$id = $_SESSION['id'];
?>
<!DOCTYPE html>
<html> 
<head> 
   <meta http-equiv="content-type" content="text/html; charset=UTF-8"/> 
   <title>Google Maps API v3 Directions Example</title>
	<link href="css/styleHead.css" rel="stylesheet" type="text/css">
	<link href="css/style.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>   
   <script type="text/javascript" 
           src="http://maps.google.com/maps/api/js?v=3.exp&sensor=true&libraries=places"></script>
           <script src="js/jquery-1.9.1.min.js"></script>
		   <script >
		$(function() {
		
			$(".navigation ul li").hover(function() {
				$(this).addClass("hover");
			}, function() {
				$(this).removeClass("hover");
			});
			
			$(".navigation ul li").click(function() {
				$(".navigation ul li").removeClass("selected");		
				$(this).addClass("selected");
			});
		
		});
		   </script>
   <style type="text/css">
   .auto-style1 {
	   margin-right: 119px;
   }
   </style>
   <style>
		input{
			width:100px;
			height:25px;
			border-radius:5px;
			border-style:solid;
			border-color:#acacac;
			font-size:13px;
			padding-left:5px;
			padding-right:5px;
		
		}
		input[type=button]{
			float:none;
			height:25px;
			width:100px;
			background-color:#34780f;
			color:#f8f8f8;
			font-family:Verdana, Arial, Helvetica, sans-serif;
			font-size:13px;
		}

		button{
			float:none;
			height:25px;
			width:100px;
			background-color:#34780f;
			color:#f8f8f8;
			font-family:Verdana, Arial, Helvetica, sans-serif;
			font-size:13px;
		}
	</style>
</head> 
<body style="font-family: Arial; font-size: 12px;" onload="execute();">
<div id="container">
	  <div class="layout">
		<div id="header">
			<div id="logo" style="width: 282px; height: 67%">
				<img src="img/logo.png">
			</div><!--End of div logo-->
			<div id="login-link">
					<a href="profile.php" style="float:right">Welcome <?php echo $_SESSION['name'];?></a><!--redirects to profile page-->
			</div><!--End of div login-link-->
			
			<div class="navigation" style="height: 68px">
				<ul style="position:relative; left: 2px; top: -26px; width: 500px;">
					<li ><a href="home.php"><span>Home</span></a></li>
					<li><a href="profile.php"><span>Profile</span></a></li>
					<li><a href="friends.php"><span>Friends</span></a></li>
					<li><a href="inbox.php"><span>Inbox</span></a></li>
					<li style="float:right" ><a href="index.php"><span>Logout</span></a></li>
				</ul>
		
			</div> 		
		</div><!--End of div header-->
<input id="Destination" type="text" style="width:281px"  > <button onclick="execute();$('#ajax').removeAttr('disabled');">Search</button>
<input id="ajax" type="button" value="Save" disabled onclick="$('#ajax').attr('disabled','disabled');">
   <div style="width: 600px;" class="auto-style1">
	
     <div id="map" style="width: 400px; height: 400px; left: 50%; margin-top: 5%;"></div> 
     <!--<div id="panel" style="width: 250px; position:relative; left: 411px; top: -373px; height: 59px;"></div> -->
   </div>
   </div><!--End of div Layout-->
</div><!--End of div container-->
			
		<div class="footer-container">
				<div class="footer">
			         <div id="footer-left">
						<nav>
							<ul>
								<li>Need A Ride &copy; 2013</li>
								<li><a href="#">Help</a></li>
								<li><a href="#">About</a></li>
								<li><a href="#">Privacy</a></li>
								<li><a href="#">Terms</a></li>
							</ul>
						</nav>
					</div><!--End of div footer-left-->
					<div id="footer-right">
						<a href="http://www.facebook.com/" target="_blank">
							<img src="img/facebook.png">
						</a>
						<a href="http://www.twitter.com/" target="_blank">
							<img src="img/twitter.png">
						</a>
										
					</div>
				</div>
			</div><!--End of Footer Container-->
			
</body>
</html>

   <!--<script type="text/javascript">
   //$(document).ready(function(){ 
   $("#ajax").click(function() {
   if (navigator.geolocation) { //Checks if browser supports geolocation
   navigator.geolocation.getCurrentPosition(function (position) {    
   
   var destination = document.getElementById("Destination");
   var latitude = position.coords.latitude;                    //users current
     var longitude = position.coords.longitude;                 //location
     var coords = new google.maps.LatLng(latitude, longitude); 
   
   //alert("Data: " + coords);

   var dbstr = latitude +"," + longitude;
   
                   $.post("save_route.php",
					{
						source:dbstr,
						destination:"saddar karachi"
					},
						function(data,status){
						alert("Data: " + coords + "\nStatus: " + status);
						});            
						
						
			});
			}
        });
        
        
</script>-->
<script>

var source = "l";
var sink= "x";


function execute(){

if (navigator.geolocation) { //Checks if browser supports geolocation
   navigator.geolocation.getCurrentPosition(function (position) {    
   
   var destination = document.getElementById("Destination");
   var latitude = position.coords.latitude;                    //users current
     var longitude = position.coords.longitude;                 //location
     var coords = new google.maps.LatLng(latitude, longitude); 
     var directionsService = new google.maps.DirectionsService();
     //var panel=document.getElementById('panel');
     var directionsDisplay = new google.maps.DirectionsRenderer({'draggable':true} );

 source = latitude +"," + longitude;
	sink =destination.value;
     var map = new google.maps.Map(document.getElementById('map'), {
       zoom:7,
       mapTypeId: google.maps.MapTypeId.ROADMAP
     });

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
	 
     
     $(document).ready(function(){
     $("#ajax").click(function() {
     
     
                   $.post("save_route.php",
					{
						//id: 3,
						source:source,
						destination:sink
					},
						function(data,status){
						alert("Data: " + source +"\nStatus: " + status);
						});            
						
						
			});
		});



   </script> 
</body> 
</html>