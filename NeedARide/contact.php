<?php require_once("constants.php");
session_start();
$id = $_SESSION['id'];

//if(isset($_GET['name'])) 
$to = $_GET['name'];

?>

<!DOCTYPE html>
<html>

<head>
	<title>Need A Ride - Inbox</title>
	<link href="css/styleHead.css" rel="stylesheet" type="text/css">
	<link href="css/style.css" rel="stylesheet" type="text/css">	
	<link href="css/styleReply.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
	
</head>

<body>
	<div id="header">
			<div id="logo" style="width: 282px; height: 67%">
				<img src="img/logo.png">
			</div><!--End of div logo-->
			
			<div id="login-link">
					<a href="#" style="float:right">Welcome, <?php echo $_SESSION['name'];?></a><!--redirects to profile page-->
			</div><!--End of div login-link-->
			
				
		</div>
		<h2 class="blockhead">Send Message to <?php echo $to; ?> </h2>
	<div class="block">
		<div class="blockbody formcontrols">
						<div class="form-submit cbt">
				<form method="post" action="compose.php">
		<div id="post-editor" class="post-editor">
			<div style="position: relative;">     
				<div class="wmd-container">
					<div id="wmd-button-bar" class="wmd-button-bar"></div>
					<textarea name="message" class="wmd-input" name="post-text" placeholder="Post your Comment" cols="92" rows="15" tabindex="101" required></textarea>
				</div>
			</div>

				<input type="submit" value="Send Message" tabindex="110">
				<input type="button" value="Home" onclick="window.location='home.php'" tabindex="110">
				<input type="hidden" name="to" value="<?php $response = mysql_query("SELECT Id from user where Name = '{$to}'",$connection) or die(mysql_error()); $row = mysql_fetch_array($response); echo $row['Id']; ?>">
			</div>
			</form>
		</div>
		
			
		</div>
	</div>
		
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