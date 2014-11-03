<?php
require_once("constants.php");

session_destroy();

if(isset($_POST['username'])) $username = $_POST['username'];

if(isset($_POST['password'])) $password = md5($_POST['password']);

$response = mysql_query("SELECT Id,Name,password FROM user where username = '{$username}'",$connection) or die(mysql_error());

$row = mysql_fetch_array($response);

if(($row['password']) == $password)
{	session_start();
	$_SESSION['id'] = $row['Id'];
	$_SESSION['name'] = $row['Name'];
	
	header('Location: home.php');
	
}
else
{
	//echo("Access denied, wrong password");
	echo "<script type='text/javascript'> alert(\"Hi\"); </script>";
	header('Location: index.php?error=1');
	
}
	// if(!mysql_query($query,$connection))
// {
	// $file_handle=fopen("error_log.txt",'w');
	// fwrite($file_handle,mysql_error());
	// fclose($file_handle);
// }
mysql_close($connection);

?>