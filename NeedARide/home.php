<?php require_once("constants.php");
session_start();
$id = $_SESSION['id'];
?>
<!DOCTYPE html>
<html>

<head>
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

	<title>Need A Ride - Home</title>
	<link href="css/styleHead.css" rel="stylesheet" type="text/css">
	<link href="css/style.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="js/ticker.js"></script>
	<script type="text/javascript" src="js/googlemaps.js"></script>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=true&libraries=places"></script>
	
	<script>
	function initialize() {



var origin_input = document.getElementById('destination');

var options = {
	componentRestrictions: {country: 'pk'}
};


var autocomplete_origin = new google.maps.places.Autocomplete(origin_input, options);    
}

google.maps.event.addDomListener(window, 'load', initialize);*/

</script>
	
	
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
		
		function tick(){
			$('#ticker li:first').animate({'opacity':0}, 200, function () { $(this).appendTo($('#ticker')).css('opacity', 1); });
		}
		setInterval(function(){ tick () }, 2500);
		
		


	</script>
</head>

<body>
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
		<div id="travel-search">
			<form action="display_route.php" method="post">
			<input type="text"  name="destination" id="destination" placeholder="Search for your destination"/>
			<input type="submit" value="Search">
			</form>
			</div> 
			</div> 		
		</div><!--End of div header-->
		<ul id="ticker" style="height:50px ;text-align: center;font-size: 20px;">
		

			
<?php $response = mysql_query("SELECT *from ride where creator in (Select user2 from friend_of where user1 = '$id' and accepted =1) order by ride_id desc",$connection) or die(mysql_error());
echo "Latest Travels";
while($row=mysql_fetch_array($response))
{
	$response2 = mysql_query("SELECT name from user where id = {$row['creator']}",$connection) or die(mysql_error());
	while($row2=mysql_fetch_array($response2))
	{
		echo "<li><a style='text-decoration:none;color:green' href='contact.php?name=".$row2['name']."'>".$row2['name']." is going to ".$row['destination']."</a></li>";
	}
	}
?>
</ul>
<input type="button" value="Offer a ride" onclick="window.location='directions.php';">
		<div id="mapholder" style="top:8%;left:26.5%;margin-top: 2%;"></div>

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

<script>
/*
var destination = document.getElementById('destination');

var map = document.getElementById('mapholder');
var options = {  componentRestrictions: {country: 'pk'}
};

autocomplete = new google.maps.places.Autocomplete(destination,options);
autocomplete.bindTo('bounds', map);


	function initialize() {



var origin_input = document.getElementById('destination');

var options = {
	componentRestrictions: {country: 'pk'}
};


var autocomplete_origin = new google.maps.places.Autocomplete(origin_input, options);    
}

google.maps.event.addDomListener(window, 'load', initialize);
*/
</script>


		
</html>