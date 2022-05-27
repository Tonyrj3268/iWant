<?php
$servername = "localhost";
$db_username = "109306066";
$db_password = "109306066";
$dbname = "db-test";
// 创建连接
$conn = new mysqli($servername, $db_username, $db_password,$dbname);
 
// 检测连接
if ($conn->connect_error) {
    die("連接失敗: " . $conn->connect_error);
}

function fetch_user_chat_history($from_user_id, $to_user_id, $conn)
{
 $query = "
 SELECT * FROM user_chat 
 WHERE (user_id = '".$from_user_id."' 
 AND to_user_id = '".$to_user_id."') 
 OR (user_id = '".$to_user_id."' 
 AND to_user_id = '".$from_user_id."') 
 ORDER BY chat_timestamp asc
 ";
 $result = mysqli_query($conn,$query);
 $output = '<ul class="list-unstyled">';
 foreach($result as $row)
 {
  $user_name = '';
  if($row["user_id"] == $from_user_id)
  {
   $user_name = '<b class="text-success">You</b>';
  }
  else
  {
   $user_name = '<b class="text-danger">'.get_user_name($row['user_id'], $conn).'</b>';
  }
  $output .= '
  <li style="border-bottom:1px dotted #ccc">
   <p>'.$user_name.' - '.$row["chat_msg"].'
    <div align="right">
     - <small><em>'.$row['chat_timestamp'].'</em></small>
    </div>
   </p>
  </li>
  ';
 }
 $output .= '</ul>';
 $query = "
 UPDATE user_chat
 SET status = '0' 
 WHERE user_id = '".$to_user_id."' 
 AND to_user_id = '".$from_user_id."' 
 AND status = '1'
 ";
 $result = mysqli_query($conn,$query);
 return $output;
}
function get_user_name($user_id, $conn)
{
 $query = "SELECT user_name FROM user_info WHERE user_account = '$user_id'";
 $result = mysqli_query($conn,$query);
 foreach($result as $row)
 {
  return $row['user_name'];
 }
}
function count_unseen_message($from_user_id, $to_user_id, $conn)
{
 $query = "
 SELECT * FROM user_chat
 WHERE user_id = '$to_user_id' 
 AND to_user_id = '$from_user_id'
 AND status = 1
 ";
 $result = mysqli_query($conn,$query);
 $count = mysqli_affected_rows($conn);
 $output = '';
 if($count > 0)
 {
  $output = '<span class="label label-success">'.$count.'</span>';
 }
 return $output;
} 
?>