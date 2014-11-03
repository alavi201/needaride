<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>Kapray Admin Manage Slider Image</title>
       
        <!-- CSS Reset -->
		<link rel="stylesheet" type="text/css" href="reset.css" tppabs="http://www.xooom.pl/work/magicadmin/css/reset.css" media="screen" />
       
        <!-- Fluid 960 Grid System - CSS framework -->
		<link rel="stylesheet" type="text/css" href="grid.css" tppabs="http://www.xooom.pl/work/magicadmin/css/grid.css" media="screen" />
		
        <!-- IE Hacks for the Fluid 960 Grid System -->
        <!--[if IE 6]><link rel="stylesheet" type="text/css" href="ie6.css" tppabs="http://www.xooom.pl/work/magicadmin/css/ie6.css" media="screen" /><![endif]-->
		<!--[if IE 7]><link rel="stylesheet" type="text/css" href="ie.css" tppabs="http://www.xooom.pl/work/magicadmin/css/ie.css" media="screen" /><![endif]-->
        
        <!-- Main stylesheet -->
        <link rel="stylesheet" type="text/css" href="styles.css" tppabs="http://www.xooom.pl/work/magicadmin/css/styles.css" media="screen" />
        
        <!-- WYSIWYG editor stylesheet -->
        <link rel="stylesheet" type="text/css" href="jquery.wysiwyg.css" tppabs="http://www.xooom.pl/work/magicadmin/css/jquery.wysiwyg.css" media="screen" />
        
        <!-- Table sorter stylesheet -->
        <link rel="stylesheet" type="text/css" href="tablesorter.css" tppabs="http://www.xooom.pl/work/magicadmin/css/tablesorter.css" media="screen" />
        
        <!-- Thickbox stylesheet -->
        <link rel="stylesheet" type="text/css" href="thickbox.css" tppabs="http://www.xooom.pl/work/magicadmin/css/thickbox.css" media="screen" />
        
        <!-- Themes. Below are several color themes. Uncomment the line of your choice to switch to different color. All styles commented out means blue theme. -->
        <link rel="stylesheet" type="text/css" href="theme-blue.css" tppabs="http://www.xooom.pl/work/magicadmin/css/theme-blue.css" media="screen" />
        <!--<link rel="stylesheet" type="text/css" href="css/theme-red.css" media="screen" />-->
        <!--<link rel="stylesheet" type="text/css" href="css/theme-yellow.css" media="screen" />-->
        <!--<link rel="stylesheet" type="text/css" href="css/theme-green.css" media="screen" />-->
        <!--<link rel="stylesheet" type="text/css" href="css/theme-graphite.css" media="screen" />-->
        
		<!-- JQuery engine script-->
		<script type="text/javascript" src="jquery-1.3.2.min.js" tppabs="http://www.xooom.pl/work/magicadmin/js/jquery-1.3.2.min.js"></script>
        
		<!-- JQuery WYSIWYG plugin script -->
		<script type="text/javascript" src="jquery.wysiwyg.js" tppabs="http://www.xooom.pl/work/magicadmin/js/jquery.wysiwyg.js"></script>
        
        <!-- JQuery tablesorter plugin script-->
		<script type="text/javascript" src="jquery.tablesorter.min.js" tppabs="http://www.xooom.pl/work/magicadmin/js/jquery.tablesorter.min.js"></script>
        
		<!-- JQuery pager plugin script for tablesorter tables -->
		<script type="text/javascript" src="jquery.tablesorter.pager.js" tppabs="http://www.xooom.pl/work/magicadmin/js/jquery.tablesorter.pager.js"></script>
        
		<!-- JQuery password strength plugin script -->
		<script type="text/javascript" src="jquery.pstrength-min.1.2.js" tppabs="http://www.xooom.pl/work/magicadmin/js/jquery.pstrength-min.1.2.js"></script>
        
		<!-- JQuery thickbox plugin script -->
		<script type="text/javascript" src="thickbox.js" tppabs="http://www.xooom.pl/work/magicadmin/js/thickbox.js"></script>
        
        <!-- Initiate WYIWYG text area -->
		<script type="text/javascript">
			$(function()
			{
			$('#wysiwyg').wysiwyg(
			{
			controls : {
			separator01 : { visible : true },
			separator03 : { visible : true },
			separator04 : { visible : true },
			separator00 : { visible : true },
			separator07 : { visible : false },
			separator02 : { visible : false },
			separator08 : { visible : false },
			insertOrderedList : { visible : true },
			insertUnorderedList : { visible : true },
			undo: { visible : true },
			redo: { visible : true },
			justifyLeft: { visible : true },
			justifyCenter: { visible : true },
			justifyRight: { visible : true },
			justifyFull: { visible : true },
			subscript: { visible : true },
			superscript: { visible : true },
			underline: { visible : true },
            increaseFontSize : { visible : false },
            decreaseFontSize : { visible : false }
			}
			} );
			});
        </script>
        
        <!-- Initiate tablesorter script -->
        <script type="text/javascript">
			$(document).ready(function() { 
				$("#myTable") 
				.tablesorter({
					// zebra coloring
					widgets: ['zebra'],
					// pass the headers argument and assing a object 
					headers: { 
						// assign the sixth column (we start counting zero) 
						6: { 
							// disable it by setting the property sorter to false 
							sorter: false 
						} 
					}
				}) 
			.tablesorterPager({container: $("#pager")}); 
		}); 
		</script>
        
        <!-- Initiate password strength script -->
		<script type="text/javascript">
			$(function() {
			$('.password').pstrength();
			});
        </script>
	</head>
	<body>
        <div id="header">
            <!-- Header. Status part -->
            <div id="header-status">
                <div class="container_12">
                    <div class="grid_8">
					
                    </div>
                     <div class="grid_4" style="width:100%;float:right;">
					 

<h2 style="color:white;">

					<?php
session_start();
include '../initDB.php';

if(isset($_SESSION['admin']))
{
$adminName=$_SESSION['admin'];
	echo "Hi Mr. $adminName";
	
	if(isset($_POST['uploadPhotoBtn']))
	{
		$uploadPath=upload();
		mysql_query("Insert into slider (Imgsrc) values ('$uploadPath')")or die("Photo not uploaded!");
	}
}
else
{
	echo "Illegal access to this page, Sorry!";
}

?>
<br/>
<a href="../AdminProfile.php" id="home">Home</a>

<a href="../Logout.php" id="logout">Logout</a></h2></div>

</div>
            

                <div style="clear:both;"></div>
            </div> <!-- End #header-status -->
            <!-- Header. Main part -->
            <div id="header-main">
                <div class="container_12">
                    <div class="grid_12">
                        <div id="logo">
                            <ul id="nav">
                                <li><a href="../AdminFunctions/ManageCategory.php">Manage Categories</a></li>
                                <li><a href="../AdminFunctions/ManageProduct.php">Manage Products</a></li>
                               <li><a href="../AdminFunctions/ManageCustomer.php">Manage Customers</a></li>
                                 <li><a href="../AdminFunctions/EmailOfferForm.php">Email Offers</a></li>
  
                               <li style="width:130px;height:33.5px;"><a href="../AdminFunctions/AdminViewOrders.php">View Orders<script type="text/javascript" src="javascript.js"></script>
	<body onload="showUser()"><div id="output"  /><body/></a></li>
                                  <li id="current"><a href="../AdminFunctions/PhotoUploader.php">Manage Slider Image</a></li>

                        </div></ul>
<!-- End. #Logo -->
                    </div><!-- End. .grid_12-->
                    <div style="clear: both;"></div>
                </div><!-- End. .container_12 -->
            </div> <!-- End #header-main -->
            <div style="clear: both;"></div>
          
        </div> <!-- End #header -->          
                <!-- Example table -->
                <div class="module">
                	<h2><span><center>Manage Slider Image</center></span></h2>
                 </div> 
                        	
        
            
	<div style="padding-left:40%;">

	<form action="" method="post" enctype="multipart/form-data">
	<label for="file">Filename:</label>
	<input type="file" name="sliderPhotoFile" id="sliderPhotoFile">
	<input type="submit" name="uploadPhotoBtn" id="uploadPhotoBtn" value=" Upload ">
	</form>

	</div>
<br/><br/><br/>

<div style="padding-left:40%;"><Legend>Delete Image</legend></div>
	<div style="padding-left:15%;">
                    <div class="module-table-body">
                    	
                        <table id="myTable" class="tablesorter">
                        	
							<thead>
                                <tr>
                                    <th style="width:10%">Image Preview</th>
                                          <th style="width:10%">Option</th>
                                    
                                </tr>
								
                            </thead>
						
         
        
		
<?php
	//session_start();
	include '../initDB.php';
	
	if(isset($_SESSION['admin']))
	{
	
	if(isset($_POST['deletePhotoBtn']))
	{
		$deletedPhotoID=$_POST['photoID'];
		$deletedPhotoPath=$_POST['sliderPhotoImagePath'];
		
		mysql_query("delete from slider where idSlider=$deletedPhotoID") or die('photo not deleted');
		unlink($deletedPhotoPath);
	}
	
	$sliderPhotosTbl=mysql_query("select * from slider") or die("Photos not received");
	
	while($row=mysql_fetch_array($sliderPhotosTbl))
	{
	
	echo "<tr>";
	echo "<form action='' method='post'>";
	$sliderImagePath=$row['Imgsrc'];
	$sliderID=$row['idSlider'];
	echo "<td><img id='imgprev' src='$sliderImagePath'style='width:150px;height:150px;border:1px'></td>";
	//echo "<td><a href='$ADMIN_MANAGE_CUSTOMER?deleteCustomerID=$customerID'>delete</a></td>";
			echo "<td><input type='submit' name='deletePhotoBtn' id='deletePhotoBtn' value='Delete' class='classname'/></td>";			
			echo "<input type='hidden' name='photoID' id='photoID' value='$sliderID'/>";
			echo "<input type='hidden' name='sliderPhotoImagePath' id='sliderPhotoImagePath' value='$sliderImagePath'/>";
			echo"</form>";
			echo "</tr>";
			
	}
	
	echo "</table>";
		
	}
	else
	{
		echo "Illegal access to this page, Sorry!";
	}
?>

<?php
function upload()
{
	include('SimpleImage.php');		//Script file containing functions to resize.
    $image = new SimpleImage();  
	include '../initDB.php';
	$query = "SELECT * FROM slider ORDER BY idSlider DESC";			// query PID from DB
	$nResult = mysql_query($query) or die(mysql_error()); 
	
  	$filename = $_FILES['sliderPhotoFile']['name']; // Get the name of the file (including file extension).
 	$ext = substr($filename, strpos($filename,'.'), strlen($filename)-1); // Get the extension from the filename.
			
	if ($nResult)
	{
		if (mysql_num_rows($nResult) >0)			// if PID found
		{
			$data = mysql_fetch_array($nResult);
			$num = $data["idSlider"] + 1;
			$newfilename = $num.$ext;	
			$newfilename = "slider_images/".$num.$ext;	
		}
		else
		{													// if your DB will be empty then the Image name will be blank ".jpg". So set it
			$newfilename = $_FILES['sliderPhotoFile']['name'];		// to default name.
			$newfilename = "slider_images/"."1.jpg";
		}
	}
	
	$allowed_filetypes = array('.jpg','.gif','.bmp','.png','jpeg','.JPG','.GIF','.PNG','.JPEG','.BMP'); // These will be the types of file that will pass the validation.
    $max_filesize = 1524288; // Maximum filesize in BYTES (currently 1.5MB).
    $upload_path = './slider_images/'; // The place the files will be uploaded to (currently a 'files' directory).
   
   if(!in_array($ext,$allowed_filetypes))
      die('The file you attempted to upload is not allowed.');
 
   if(filesize($_FILES['sliderPhotoFile']['tmp_name']) > $max_filesize)
      die('The file you attempted to upload is too large.');
 
   if(!is_writable($upload_path))
      die('You cannot upload to the specified directory, please CHMOD it to 777.');
 
   if(move_uploaded_file($_FILES['sliderPhotoFile']['tmp_name'], $newfilename))		//move the temp file into local disk
   {
   		$image->load($newfilename);
   		$image->resize(900,317);
   		$image->save($newfilename); 
        return $newfilename;
   }
      else
         echo 'There was an error during the file upload.  Please try again.';
}
?>	
</div>

        <div id="footer">
        	<div class="container_12">
            	<div class="grid_12">
                	<!-- You can change the copyright line for your own -->
                	<p>&copy; Copyright Kapray 2013.</p>
        		</div>
            </div>
            <div style="clear:both;"></div>
        </div> <!-- End #footer -->

		