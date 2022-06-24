<?php

$user = $_POST['user'];
require_once 'connect.php';
//取得通知ID和內容
$query = "SELECT count(status) as a FROM user_chat where status=1 and to_user_id=".$user;
$result = mysqli_query($conn,$query);
$count=0;
if ($result){
    foreach($result as $row)
    {

        $count=$row["a"];

        
    }
}


echo $count;

?>