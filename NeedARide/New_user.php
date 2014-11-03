<?php
require_once("constants.php");

if(isset($_POST['name'])) $name = $_POST['name'];

if(isset($_POST['username'])) $username = $_POST['username'];

if(isset($_POST['password'])) $password = md5($_POST['password']);

if(isset($_POST['gender'])) $gender = $_POST['gender'];

if(isset($_POST['DOB'])) $DOB = $_POST['DOB']; 


$query="INSERT INTO user(name,username,password,gender,dob) VALUES ('{$name}','{$username}', '{$password}' , '{$gender}','{$DOB}')";

mysql_query($query,$connection) or die(mysql_error());

$query2="Select * from user where username = '{$username}'";
$response = mysql_query($query2,$connection) or die(mysql_error());

$row = mysql_fetch_array($response);

session_start();


$_SESSION['id'] = $row['Id'];
$_SESSION['name'] = $row['Name'];
$query2="insert into images (id,data) values({$row['Id']},'upload/default.jpg')";
	  mysql_query($query2,$connection) or die(mysql_error());
header('Location: home.php');

?>