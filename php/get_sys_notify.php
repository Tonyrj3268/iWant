<?php


require_once 'connect.php';
//取得通知ID和內容
$query = "SELECT sys_notify_index,sys_msg,read_status,notify_time FROM `db-test`.sys_notify where to_user_id=".$_COOKIE['name']." order by notify_time desc;";
$result = mysqli_query($conn,$query);


$output = '
<table class="table table-bordered table-striped">
 <tr>
  <td>系統通知</td>
  <td>時間</td>
 </tr>
';

foreach($result as $row)
{
    $output .= '
            <tr class="notify" notify_id="'.$row['sys_notify_index'].'" >
            <td style="'.count_unseen_notify($row['read_status']).'">'.$row['sys_msg'].'</td>
            <td>'.$row['notify_time'].'</td>
            </tr>
            ';
    
}

$output .= '</table>';

echo $output;

function count_unseen_notify($read_status)
{
    $output = 'font-weight: bold';
    if($read_status == 0)
    {
    $output = '';
    }
    return $output;
} 
?>