<?php
require_once 'connect.php';
$to_user_id = $_POST['to_user_id'];
$user_id = $_COOKIE['name'];
$stuff_id = $_POST['stuff_id'];
$notify_topic = $_POST['notify_topic'];
$notify_content = $_POST['notify_content'];

$user_name=get_user_name($user_id, $conn);
$sys_msg="買家".$user_name.'('.$user_id.')'.$notify_content;

$query = "
INSERT INTO sys_notify 
(sys_title, sys_msg,to_user_id, read_status) 
VALUES ('$notify_topic','$sys_msg','$to_user_id',1)
";

$result = mysqli_query($conn,$query);

if($result)
{
    echo "success";
}
else{
    echo '租借失敗';
    //echo "fail";
}

?>