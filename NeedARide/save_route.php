<?php
require_once("constants.php");
session_start();
$id = $_SESSION['id'];
if(isset($_POST['source'])) $source = $_POST['source'];

if(isset($_POST['destination'])) $destination = $_POST['destination'];

$query="INSERT INTO ride(creator,source,destination) VALUES ({$id},'{$source}', '{$destination}' )";

mysql_query($query,$connection) or die(mysql_error());

mysql_close($connection);

?>