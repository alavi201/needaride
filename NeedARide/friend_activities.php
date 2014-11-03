<?php
require_once("constants.php");
session_start();
$id = $_SESSION['id'];
$friend = $_GET['friend'];
?>
<!DOCTYPE html>
<html>

<head>
	<title>Need A Ride - John Doe</title>
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
	<link rel="stylesheet" type="text/css" href="css/styleHead.css"/>
	<link rel="stylesheet" type="text/css" href="css/ProfileStyle.css"/>
	<link href="css/inboxStyle.css" rel="stylesheet" type="text/css">

	<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
	
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
		$(document).ready(function(){
			 $(".two").hover(function() {
				$(this).animate({
					marginLeft : "+=20px"
				});
				
			   }, function() {
				
				$(this).animate({
					marginLeft : "-=20px"
				});
				
			 });
	   	 
		});
	</script>
			
	
</head>

<body style="font-size: 20px;">
	<div id="container">
		<div id="header">
			<div id="logo" style="width: 282px; height: 67%">
				<img src="img/logo.png">
			</div><!--End of div logo-->
			
			<div id="login-link">
					<a href="#" style="float:right">Welcome <?php echo $_SESSION['name'];?></a><!--redirects to profile page-->
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
		
		<div id="content">
			<article class="stream">
				<header>
					<h2>Recent Activities</h2>
				</header>
			<br />
	<?php			$response = mysql_query("SELECT * from ride where creator = {$friend} order by ride_id desc",$connection) or die(mysql_error());
$count=1;
while($row=mysql_fetch_array($response))
{	
	echo "<li class='postbitlegacy postbitim postcontainer old' >
							<div class='posthead'>
								<span class='postdate old'>
									<span class='date'>02-28-2013,&nbsp;<span class='time'>10:33 PM</span></span>
									
								</span>
								<span class='nodecontrols'>
									<a name='post651397' class='postcounter'>".$count."</a><a  name='1'></a>
								</span>
				</div><!--End of postlist Div-->
				<section class='messages'>					
					<p>offered a ride to ".$row['destination']."</p>
				</section>
				</li>
			";
			
			$count++;
}	
$response = mysql_query("Select Name from user where Id in(SELECT user2 from friend_of where user1 = {$friend} and accepted = 1)",$connection) or die(mysql_error());

while($row=mysql_fetch_array($response))
{	
	echo "<li class='postbitlegacy postbitim postcontainer old' >
							<div class='posthead'>
								<span class='postdate old'>
									<span class='date'>02-28-2013,&nbsp;<span class='time'>10:33 PM</span></span>
									
								</span>
								<span class='nodecontrols'>
									<a name='post651397' class='postcounter'>".$count."</a><a  name='1'></a>
								</span>
				</div><!--End of postlist Div-->
				<section class='messages'>					
					<p>Became friends with ".$row['Name']."</p>
				</section>
				</li>";
				$count++;
}	
		?>	</article>
					
		</div><!--End of Div Content-->

		<aside>
			<section style="text-align:center;">
				<ul>
					<li><a class="two" href="friend_profile.php?friend=<?php echo $friend; ?>""><span>About</span></a></li>
					<li><a class="two" href="friend_activities.php?friend=<?php echo $friend; ?>""><span>Activities</span></a></li>
					<li><a class="two" href="#"><span>Gallery</span></a></li>

				</ul>
			</section>
			
		</aside>

		
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