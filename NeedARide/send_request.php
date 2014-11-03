<?php require_once("constants.php");
session_start();
$id = $_SESSION['id'];
if(isset($_POST['user2'])) $user2 = $_POST['user2'];
$query="Insert into friend_of (user1, user2) values ('{$id}','{$user2}') ";

mysql_query($query,$connection) or die(mysql_error());

header('Location: friends.php');

?>