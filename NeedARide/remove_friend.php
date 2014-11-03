<?php require_once("constants.php");
session_start();
$id = $_SESSION['id'];
$user2 = $_POST['user2'];
$query="Delete from friend_of where user1 = {$user2} and user2 = {$id}";

mysql_query($query,$connection) or die(mysql_error());

$query = "delete from friend_of where user1 = {$id} and user2 = {$user2}"; 

mysql_query($query,$connection) or die(mysql_error());

header('Location: friends.php');

?>