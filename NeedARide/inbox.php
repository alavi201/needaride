<?php
require_once("constants.php");
session_start();
$id = $_SESSION['id'];
?>
<!DOCTYPE html>
<html>

<head>
	<title>Need A Ride - Inbox</title>
	<link href="css/styleHead.css" rel="stylesheet" type="text/css">
	<link href="css/style.css" rel="stylesheet" type="text/css">
	<link href="css/inboxStyle.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
	<script>$(document).ready(function(){
$("#New").click(function(){ $("#panel").slideDown();});});
</script>
<script>
$(document).ready(function(){	
$("#panel").hide();	
  });</script>
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

	<style>

input{
			width:175px;
			height:35px;
			border-radius:5px;
			border-style:solid;
			border-color:#acacac;
			font-size:18px;
		    text-align:center;
		
		}
		input[type=button1],[type=submit]{
			float:left;
			height:32px;
			width:200px;
			background-color:#34780f;
			color:#f8f8f8;
			font-family:Verdana, Arial, Helvetica, sans-serif;
			font-size:13px;
		
		}
		input[type=button]{
			float:none;
			height:20px;
			width:50px;
			background-color:#34780f;
			color:#f8f8f8;
			font-family:Verdana, Arial, Helvetica, sans-serif;
			font-size:11px;
			float:right;
			margin-right:20px;
		}

</style>
</head>

<body>
	<div id="container">
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
		</div><!--End of div header--><br><br>
		
	<div id="above_postlist" class="above_postlist">
		<div id="pagination_top" class="pagination_top">
			<form action="" method="get" class="pagination popupmenu nohovermenu">
				<input type="hidden" name="t" value="125896" />
					<span class="selected">
						<a href="javascript://" title="Results 1 to 10 of 11">1</a>
					</span>
					<span>
						<a href="" title="Show results 11 to 11 of 11">2</a>
					</span>
					<span class="prev_next">
						<a rel="next" href="" title="Next Page - Results 11 to 11 of 11">
							<img src="images/reputation/next-right.png" alt="Next" />
						</a>
					</span>
					<span class="first_last">
						<a href="" title="Last Page - Results 11 to 11 of 11">Last
							<img src="images/reputation/last-right.png" alt="Last" />
						</a>
					</span>
			
				
			</form>
			
		</div>
	</div>
	<input id="New" type="submit"  style="position:relative; top: 7px; left: 38px;" value="Compose" onclick="window.location='new_message.php'" />
<ol id="posts" class="posts">
<?php //require_once("constants.php");
//session_start();
//$id = $_SESSION['id'];
$count = 1;
$response = mysql_query("SELECT message,sender,time from messages where recipient = '{$id}' order by time desc",$connection) or die(mysql_error());

while($row=mysql_fetch_array($response))
{	

$response2 = mysql_query("SELECT Name,Id from user where Id = {$row['sender']} ",$connection) or die(mysql_error());

while($row2=mysql_fetch_array($response2))
{	$response3 = mysql_query("SELECT * from images where id = {$row2['Id']}",$connection) or die(mysql_error());
	while($row3=mysql_fetch_array($response3))
	{
	
	echo"<li class='postbitlegacy postbitim postcontainer old' >

		<div class='posthead'>
				<span class='postdate old'>
					<span class='date'>".$row['time']."</span>
					
				</span>
				<span class='nodecontrols'>
					<a  class='postcounter'> #".$count."</a><a  ></a>
				</span>
		</div>
		
		<div class='postdetails'>
			<div class='userinfo'>
				<div class='username_container'>
				
					<div class='popupmenu memberaction'>
						<a class='username offline popupctrl' href='#'><strong>".$row2['Name']."</strong></a>
						<ul class='popupbody popuphover memberaction_body'>
							<li class='left'>
								<a href='#' class='siteicon_profile'>
									View Profile
								</a>
							</li>
							
							<li class='right'>
								<a href='#' class='siteicon_forum' rel='nofollow'>
									View Forum Posts
								</a>
							</li>
									
						</ul>
	
					</div>
				</div>
		<a class='postuseravatar' href='#' title=''>
				<img src='".$row3['data']."' width='100' height='150'/> 
			</a>

					<hr />
					
					<div class='imlinks'>
							
					</div>
				
			</div>
			<div class='postbody'>
				<div class='postrow'>
					
					<h2 class='title icon'>
						
					</h2>
							
					<div class='content'>
						<div >
							<blockquote class='postcontent restore'>".$row['message']."</blockquote>
						</div>
						
					</div>
				</div>
				
				<div class='cleardiv'></div>
				</div>
		</div>
		<div class='postfoot'>
						<div class='textcontrols floatcontainer'>
							<span class='postcontrols'>
							<form method='POST' action='reply.php'>
								<input type='submit' value='reply' style='float: right; width: 80px; height: 28px;'>
								<input type='hidden' name='to'  value='".$row['sender']."'   >
														
							</form>
						</div>
						</div>
		<hr />
	</li>";
	//echo "<a href='#'><li><div style='float:left'>".$row['message']."</div><div style='float:right'>".$row['time']."</div></li></a>";
	
	$count++;
	}
}	
}
?>
</ol>
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