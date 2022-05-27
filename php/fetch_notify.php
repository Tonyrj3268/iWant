<?php

//fetch_user_chat_history.php

require_once 'connect.php';

echo fetch_notify($_POST['user_id'], $_POST['notify_id'], $conn);

function fetch_notify($user_id, $notify_id, $conn)
{
 $query = "SELECT sys_msg FROM `db-test`.sys_notify where sys_notify_index='".$notify_id."' and to_user_id='".$user_id."'";
 
 $result = mysqli_query($conn,$query);
 $output = '<ul class="list-unstyled">';
 foreach($result as $row){
    $output .= '
    <li style="border-bottom:1px dotted #ccc">
     <p>'.$row["sys_msg"].'</p>
    </li>
    ';
 }
 
 $output .= '</ul>';
 $query = "
 UPDATE sys_notify
 SET read_status = '0' 
 WHERE sys_notify_index = '".$notify_id."' 
 AND to_user_id = '".$user_id."' 
 AND read_status = '1'
 ";
 $result = mysqli_query($conn,$query);
 return $output;
}
?>