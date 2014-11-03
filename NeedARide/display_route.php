<?php 
require_once("constants.php");
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
		   <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=true&libraries=places"></script>
           <script src="js/jquery-1.9.1.min.js"></script>
		    <script>
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
   <div style="width: 600px; margin-top: 10%;" class="auto-style1">
     <div id="map" style="width: 500px; height: 400px; left:50%;"></div> 
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
<script>


function execute(){




 <?php


if(isset($_POST['destination'])) $destination = $_POST['destination'];

$response = mysql_query("SELECT * from ride where destination like '%{$destination}%' and creator != {$id} ",$connection) or die(mysql_error());

$num_rows = mysql_num_rows($response);

if($num_rows ==0 )
echo "<h1>no match found</h1>";
else{
$sourci = array();
$desti = array();
$name = array();
$j = 0;
while($row2=mysql_fetch_array($response))
{
	$response2 = mysql_query("SELECT * from user where id = {$row2['creator']} ",$connection) or die(mysql_error());
	while($row1=mysql_fetch_array($response2))
	{
	$desti[$j] = $row2['destination']; 
	 $sourci[$j] = $row2['source'];
		$name[$j] = $row1['Name'];
		$j++;
	 }
}
	} 
	 ?>
var destination = <?php echo json_encode($desti); ?>;

var source = <?php echo json_encode($sourci); ?>;

var name = <?php echo json_encode($name); ?>;

//var split = new Array() ;
//split.length= destination.length;
var geocoder;
var lat = new Array() ;
lat.length= destination.length;

var lon = new Array();
lon.length= destination.length;

var i =0;
//alert(destination[0] + " " + source[0]);


 

 //split = source[0].split(',');

   //var lat = split[0];
//var lon = split[1];
				 

    // var coords = new google.maps.LatLng(lat,lon); 
	 
	 //alert(coords);
	 
	 //var split2 = source[1].split(',');
	 //var lat1 = split2[0];
	 //var lon1 = split2[1];
	 
	 //var coords2 = new google.maps.LatLng(lat1,lon1);
	 
	 //alert(coords+ " " + destination);
     var directionsService = new google.maps.DirectionsService();
     var panel=document.getElementById('panel');
     var directionsDisplay = new google.maps.DirectionsRenderer({'draggable':false} );
 //source = latitude +"," + longitude;
	//sink =destination.value;
     var map = new google.maps.Map(document.getElementById('map'), {
       zoom:7,
       mapTypeId: google.maps.MapTypeId.ROADMAP,
	   
     });

 
     directionsDisplay.setMap(map);
     //directionsDisplay.setPanel(panel);
	
	function requestDirections(coords, destination, name) {
     var request = {
       origin: coords, 
       destination: destination,
       travelMode: google.maps.DirectionsTravelMode.DRIVING
     };
		var markersource = new google.maps.Marker({
  position: coords,
  map: map,
  title: name,
  maxWidth: 50,
  clickable: true  });
  
  var infowindow = new google.maps.InfoWindow({
      content: name+" has offered this ride</br><a href='contact.php?name="+name+"'>Contact Him</a>"
	  
  });

google.maps.event.addListener(markersource, 'click', function() {
    infowindow.open(map,markersource);
  });
  
  geocoder = new google.maps.Geocoder();
geocoder.geocode({ 'address': destination }, 
		function(results, status) 
		{
			if (status == google.maps.GeocoderStatus.OK) {
			var marker = new google.maps.Marker({
								map: map,
								position: results[0].geometry.location,
								title: destination
								});
					}
		});
  
     directionsService.route(request, function(result) {
    renderDirections(result);
  });
     }
	 
	 function renderDirections(result) {
  var directionsRenderer = new google.maps.DirectionsRenderer({suppressMarkers : true});
  
  directionsRenderer.setMap(map);
  directionsRenderer.setDirections(result);
 
}
	 for( i =0; i< destination.length; i++)
{
	//alert(destination[i]);
	split = source[i].split(',');
	lat[i] = split[0];
	lon[i] = split[1];
	
	//alert(lat[i] + " " + lon[i]);
	var coords = new google.maps.LatLng(lat[i],lon[i]); 
	
	//alert(name[i]);
	requestDirections(coords, destination[i],name[i]);
}

	//requestDirections(coords, destination[0]);
	//requestDirections(coords2, destination[1]);
     
     }
 
 
 


   </script>
 </body> 
</html>