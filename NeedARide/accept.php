<?php require_once("constants.php");
session_start();
$id = $_SESSION['id'];
$user2 = $_POST['user2'];
$query="Update friend_of set accepted=1 where user1 = '$user2' and user2 = '$id'";

mysql_query($query,$connection) or die(mysql_error());

$query = "insert into friend_of (user1 , user2, accepted) values ({$id} , {$user2}, 1)"; 

mysql_query($query,$connection) or die(mysql_error());

header('Location: friends.php');

?>