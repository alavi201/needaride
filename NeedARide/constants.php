<?php
$database="needaride";
$server="localhost";
$username="root";
$password="";

$connection=mysql_connect($server,$username,$password);
mysql_select_db($database,$connection);

?>