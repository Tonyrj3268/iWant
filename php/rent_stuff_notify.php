<?php
require_once 'connect.php';
$to_user_id = $_POST['to_user_id'];
$user_id = $_COOKIE['name'];
$stuff_id = $_POST['stuff_id'];

$user_name=get_user_name($user_id, $conn);
$sys_title='有人想租用您的商品';
$sys_msg=$user_name.'向您的商品(編號:'.$stuff_id.')提出申請，並將傳送訊息給您!';

$query = "
INSERT INTO sys_notify 
(sys_title, sys_msg,to_user_id, read_status) 
VALUES ('$sys_title','$sys_msg','$to_user_id','1')
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