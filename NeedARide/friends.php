<?php
require_once("constants.php");
session_start();
$id = $_SESSION['id'];
?>
<!DOCTYPE html>
<html>

<head>
	<title>Need A Ride - Friends</title>
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
	<link href="css/styleHead.css" rel="stylesheet" type="text/css">
	<link href="css/ProfileStyle.css" rel="stylesheet" type="text/css">
	<link href="css/inboxStyle2.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
	<script>
$(document).ready(function(){$("#deta").click(function(){$("#Details").slideToggle();})});
$(document).ready(function(){	
$("#Details").hide();	
  });
$(document).ready(function(){$("#deta2").click(function(){$("#Details2").slideToggle();})});
$(document).ready(function(){	
$("#Details2").hide();	
  });



</script>
<script type="text/javascript">
<!--
function message() {
	window.location = "new_message.php"

}
//-->
</script>
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
		input[type=button],[type=submit]{
			float:none;
			height:25px;
			width:100px;
			background-color:#34780f;
			color:#f8f8f8;
			font-family:Verdana, Arial, Helvetica, sans-serif;
			font-size:13px;
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

</head>

<body>
	<div id="container">
		<div id="header">
			<div id="logo" style="width: 282px; height: 67%">
				<img src="img/logo.png">
			</div><!--End of div logo-->
			
			<div id="login-link">
					<a href="profile.php" style="float:right">Welcome, <?php echo $_SESSION['name'];?></a><!--redirects to profile page-->
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
					<form method="post" action="search.php">
						<input name ="name" type="text" placeholder="Search Friends" required>
						<input type="submit" value="Search">
					</form>
				</div> 
			</div> 		
		</div><!--End of div header-->		
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
				
				<!--<ul class="popupbody popuphover">
					<li class="formsubmit jumptopage">s
						<label>Jump to page: <input type="text" name="page" size="4" />
						</label> 
						<input type="submit" class="button" value="Go" /></li>
				</ul>-->
			    </form>
			
		    </div>
	   </div>

		
		<!--<ul style="list-style:none">
			<li id="first">
			&nbsp;<div id="profile"><a href="#"><img id="deta" height="125" src="img/profile.jpg" width="200" /></a><input type="button" value="Remove" onclick="$('#first').remove()"><p>Ali Alavi</p></div>
			
			
			<div id="Details" style="position:relative; left: 41px; top: -1px; width: 405px;"><p>D.O.B: 28-12-1992</p><p>Interests: Football</p><p>Trips: 6</p></div>
			</li>
			<li id="second">
			<div id="profile1"><a href="#"><img id="deta2" height="125" src="img/profile.jpg" width="200" /></a><input type="button" value="Remove" onclick="$('#second').remove()"><p>Haris Irfan</p></div>
			
			<div id="Details2" style="position:relative; left: 41px; top: -1px; width: 405px;"><p>D.O.B: 28-12-1992</p><p>Interests: Classic Cars</p><p>Trips: 8</p></div>
			</li>

		</ul>-->
		<div id="content2">
			<article class="stream">
				<header>
					<h2>Friends</h2>
				</header>
				<div id='postlist' class='postlist restrain'>
				<ol id='posts' class='posts' start='1'>
			<?php 	
			$response = mysql_query("SELECT * from user where id in (Select user2 from friend_of where user1 = '$id' and accepted =1)",$connection) or die(mysql_error());

while($row=mysql_fetch_array($response))
{	$response3 = mysql_query("SELECT * from images where id = {$row['Id']}",$connection) or die(mysql_error());
	while($row3=mysql_fetch_array($response3))
	{
			echo "	<li class='postbitlegacy postbitim postcontainer old' id='post_651397'>
						<div class='postdetails'>
							<div class='userinfo2'>
								<a class='postuseravatar' href='' title=''>
								<img src='".$row3['data']."' width='100' height='150'/> 
								</a>
							</div>
							
							<div class='postbody2'>
								<div class='postrow2'>
									<div class='username_container'>
				
										<div class='popupmenu memberaction'>
											<a class='username offline popupctrl' href=''><strong>".$row['Name']."</strong></a>
											<ul class='popupbody popuphover memberaction_body'>
												<li>
													<a href='friend_profile.php?friend=".$row['Id']."' class='siteicon_profile'>
														View Profile
													</a>
												</li>
												
												<li>
													<a href='friends_of_friends.php?friend=".$row['Id']."' class='siteicon_forum' rel='nofollow'>
														View Friends
													</a>
												</li>
														
											</ul>
												
										</div>
									
									</div><br>
										<div>
									
											<form method='post' action='remove_friend.php'>
											<input name='user2' type='hidden' value='".$row['Id']."'>
											<input type='submit' value='Remove'>
											</form>
											<form method='post' action='reply.php'>
											<input name='to' type='hidden' value='".$row['Id']."'>
											<input type='submit' value='Message'>
											</form>
								</div>

							</div>	
						</div><!-- End of Post Details Div -->

					</li>";
					}
}
			?>
			</ol>
			</div><!-- End of Postlist Div -->
			<div id="content2">
			<article class="stream">
				<header>
					<h2>Friend Requests</h2>
				</header>
				<div id='postlist' class='postlist restrain'>
				<ol id='posts' class='posts' start='1'>
			<?php 	
			$response2 = mysql_query("SELECT * from user where id in (Select user1 from friend_of where user2 = '$id' and accepted =0)",$connection) or die(mysql_error());

while($row2=mysql_fetch_array($response2))
{
			echo "	<li class='postbitlegacy postbitim postcontainer old' id='post_651397'>
						<div class='postdetails'>
							<div class='userinfo2'>
								<a class='postuseravatar' href='' title=''>
								<img id='deta2' src='img/profile.jpg' height='100' width='100' />
								</a>
							</div>
							
							<div class='postbody2'>
								<div class='postrow2'>
									<div class='username_container'>
				
										<div class='popupmenu memberaction'>
											<a class='username offline popupctrl' href=''><strong>".$row2['Name']."</strong></a>
											<ul class='popupbody popuphover memberaction_body'>
												<li>
													<a href='' class='siteicon_profile'>
														View Profile
													</a>
												</li>
												
												<li>
													<a href='' class='siteicon_forum' rel='nofollow'>
														View Friends
													</a>
												</li>
														
											</ul>
												
										</div>
									
									</div><br>
										<div>
										<form method='post' action='accept.php'> 
										<input type='hidden' name='user2' value='".$row2['Id']."'>
										<input type='submit' value='Accept Request'>
										</form>
										</div>
								</div>

							</div>	
						</div><!-- End of Post Details Div -->

					</li>";
}
			?>
			</ol></div>
			</div><!-- End of Postlist Div -->
		</div><!-- End of Content2 Container -->
		
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