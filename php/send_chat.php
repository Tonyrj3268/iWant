<?php
require_once 'connect.php';
$to_user_id = $_POST['to_user_id'];
$user_id = $_COOKIE['name'];
$chat_message = $_POST['chat_message'];

$query = "
INSERT INTO user_chat 
(to_user_id, user_id, chat_msg, status) 
VALUES ('$to_user_id','$user_id','$chat_message','1')
";

$result = mysqli_query($conn,$query);

if($result)
{
    echo fetch_user_chat_history($_COOKIE['name'], $_POST['to_user_id'], $conn);
}
else{
    echo $to_user_id."_".$user_id."_".$chat_message;
    //echo "fail";
}

?>