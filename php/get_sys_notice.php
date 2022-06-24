<?php

$user = $_POST['user'];
require_once 'connect.php';
//取得通知ID和內容
$query = "SELECT count(read_status) as a FROM sys_notify where read_status=1 and to_user_id=$user";
$result = mysqli_query($conn,$query);
$count=0;
if($result){
    foreach($result as $row)
    {
    
        $count=$row["a"];
    
        
    }
}


echo $count;

?>