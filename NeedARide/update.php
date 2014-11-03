<?php require_once("constants.php");
session_start();
$id = $_SESSION['id'];

if(isset($_POST['name'])) $name = $_POST['name'];

if(isset($_POST['dob'])) $dob = $_POST['dob'];

if(isset($_POST['gender'])) $gender = $_POST['gender'];

$query="update user set name= '{$name}',dob = '{$dob}',gender = '{$gender}' where id = {$id}";

mysql_query($query,$connection) or die(mysql_error());

header('Location: profile_update.php');

?>