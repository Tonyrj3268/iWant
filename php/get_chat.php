<?php
require_once 'connect.php';
$sql = "SELECT *, date_format(chatdate,'%d-%m-%Y %r') 
as cdt from chat order by ID desc limit 200";
$sql = "SELECT * FROM (" . $sql . ") as ch order by ID";
$result = mysql_query($sql) or die('Query failed: ' . mysql_error());

// Update Row Information
$msg="";
while ($line = mysql_fetch_array($result, MYSQL_ASSOC))
{
   $msg = $msg . "" .
        "" .
        "";
}
$msg=$msg . "<table style="color: blue; font-family: verdana, arial;" . 
  "font-size: 10pt;" border="0">
  <tbody><tr><td>" . $line["cdt"] . 
  " </td><td>" . $line["username"] . 
  ": </td><td>" . $line["msg"] . 
  "</td></tr></tbody></table>";

echo $msg;
?>