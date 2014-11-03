<?php
 $q=$_GET['q'];
 //$my_data=mysql_real_escape_string($q);
 require_once("constants.php");
 $sql="SELECT Name FROM user WHERE Name LIKE '%$q%' ORDER BY name";
 $result = mysql_query($sql,$connection) or die(mysql_error());

 if($result)
 {
  while($row=mysql_fetch_array($result))
  {
   echo $row['Name']."\n";
  }
 }
?>