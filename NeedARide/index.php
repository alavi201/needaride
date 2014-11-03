<?php
if(isset($_SESSION)) session_destroy();
?>

<!DOCTYPE html>
<html>

<head>
	<title>Need A Ride</title>
	
	<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
	
	<script type="text/javascript" src="js/ticker.js"></script>

	<link href="css/style.css" rel="stylesheet" type="text/css">
	<link href="css/styleHead.css" rel="stylesheet" type="text/css">

</head>

<body>
	<div id="container">
		<div id="header">
			<div id="logo" style="width: 282px; height: 67%">
				<img src="img/logo.png">
			</div><!--End of div logo-->
			
			<div id="login-link">
				<form method="post" action="authentication.php">
					<input type="text" name="username" placeholder="Username" required>
					<input type="password" name="password" placeholder="Password" required>
					<input type="submit" value="Login">
					<br>
					<?php if(isset($_GET['error']))  echo"<p style='color: red;font-size:20px;'>incorrect username or password</p>" ;?>
				</form>
			</div><!--End of div login-link-->
		</div><!--End of div header-->
		
		<!--<div style="float:left">
			<ul id="ticker" >
			<li><img src="img/ticker1.png"></li>
			<li><img src="img/ticker2.png"></li>
				<li><img src="img/ticker3.png"></li>
			</ul>
		</div>-->

		<div id="register" style="float:right;">
			<form id="signup" method="post" action="New_user.php">
				<input type="text" name="name" placeholder="Name" required><br>
				Gender:<input type="radio" name="gender" value="Male">Male
				<input type="radio" name="gender" value="Female">Female<br>
				<input type="date" name="DOB" placeholder="Date of birth"><br>
				<input type="text" name="username" placeholder="Username" required><br>
				<input type="password" name="password" placeholder="Password" required><br>
				 
				<input type="submit" value="Register Now!">
			</form>
		</div><!--End of div register-->
		</div>
	<!--End of div -->
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