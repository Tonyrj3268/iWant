<?php
require_once 'connect.php';

$msg = $_POST["msg"];
$dt = date("Y-m-d H:i:s");
$user = $_POST["name"];

$query="INSERT INTO user_chat(user_ID,chat_date,chat_msg) " .
      "values(" . $user . "," . $dt. "," . $msg . ");";

      echo $query;

$result = mysqli_query($conn,$query);
if(!$result)
{
    throw new Exception('Query failed: ' . mysqli_error($conn));
    exit();
}?>