<?php require_once("constants.php");
session_start();
$id = $_SESSION['id'];

if(isset($_POST['to'])) $to = $_POST['to'];

if(isset($_POST['message'])) $message = $_POST['message'];

$query="INSERT INTO messages(sender,recipient,message) VALUES ({$id},{$to},'{$message}')";

mysql_query($query,$connection) or die(mysql_error());

header('Location: inbox.php');

?>