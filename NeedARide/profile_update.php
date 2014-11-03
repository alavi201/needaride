<?php
require_once("constants.php");
session_start();
$id = $_SESSION['id'];
?>
<!DOCTYPE html>
<html>

<head>
	<title>Need A Ride - John Doe</title>
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
	<link rel="stylesheet" type="text/css" href="css/styleHead.css"/>
	<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>

	<style>
		input{
		width:300px;
		height:40px;
		border-radius:5px;
		border-style:solid;
		border-color:#acacac;
		font-size:24px;
		padding-left:5px;
		padding-right:5px;
	
	}
	input[type=button],[type=file],[type=submit]{
		float:none;
		height:40px;
		width:140px;
		background-color:#34780f;
		color:#f8f8f8;
		font-family:Verdana, Arial, Helvetica, sans-serif;
		font-size:18px;
	}

	</style>
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
	<script type="text/javascript">
		<!--
		function back() {
			window.location = "profile.php"
		
		}
		//-->
	</script>

</head>

<body>
	<div id="container">
		<div id="header">
			<div id="logo" style="width: 282px; height: 67%">
				<img src="img/logo.png">
			</div><!--End of div logo-->
			
			<div id="login-link">
					<a href="#" style="float:right">Welcome, <?php echo $_SESSION['name'];?></a><!--redirects to profile page-->
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
					<form>
						<input type="text" placeholder="Enter a location to search" required>
						<input type="submit" value="Search">
					</form>
				</div> 
			</div> 		
		</div><!--End of div header-->	
		<div id= "profile-info">
		<?php 
$response = mysql_query("SELECT * from user where id = '{$id}'",$connection) or die(mysql_error());

while($row=mysql_fetch_array($response))
{	
	echo "<form id='info' method='post' action='update.php' style='width: 320px'>
				<input name='name' type='text' value='".$row['Name']."'><br>
				<input name='gender' type='text' value='".$row['gender']."'><br>
				<input name='dob' type='date' value='".$row['dob']."'><br><br>
				<input type='submit' value='Update profile' style='margin-left: 110px;'>
				
			</form> ";
}	
?><input type='submit' value='Back' onclick="location.href='profile.php'" style='margin-left: -547px;'>
		</div>
		<div id="profile1" style="width: 230px;position:relative; left: 546px; top: -180px;">
	<?php		
	$response2 = mysql_query("SELECT * from images where id = {$id}",$connection) or die(mysql_error());
	while($row2=mysql_fetch_array($response2))
	{
	echo "	<img src='".$row2['data']."' width='100'/> ";
}	?>
	
			<form action="upload.php" method="post" enctype="multipart/form-data">
			<input type="file" style="width: 267px" id="file" name="file"><br><br>
			<input type="submit" value="Upload">
			</form>
		</div>
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