<?php


require_once 'connect.php';
//取得通知ID和內容
$query = "SELECT sys_notify_index,sys_title,sys_msg,read_status,notify_time FROM `db-test`.sys_notify where to_user_id=".$_COOKIE['name']." order by notify_time desc;";
$result = mysqli_query($conn,$query);


/*$output = '
<table class="table table-bordered table-striped">
 <tr>
  <td></td>
  <td>我的通知</td>
  <td>時間</td>
 </tr>
 <hr>
';*/
$output ='<div class="sys_page_intro">
<div>
    <a>我的通知</a>
</div>
</div>
<div class="sys_page_notifys">';


foreach($result as $row)
{
    /*$output .= '
            <tr class="notify" notify_id="'.$row['sys_notify_index'].'" >
            <td>●</td>
            <td style="'.count_unseen_notify($row['read_status']).'">'.$row['sys_title'].'</td>
            <td>'.$row['notify_time'].'</td>
            </tr>
            ';*/
    $output .= '
    <div class="notify" notify_id="'.$row['sys_notify_index'].'" >
    <a class="notify_circle">●</a>
    <a style="'.count_unseen_notify($row['read_status']).'width: 400px;font-size:25px">'.$row['sys_title'].'</a>
    <a class="notify_time">'.$row['notify_time'].'</a>
    </div>';                
    
}

$output .= '</div>';

echo $output;

function count_unseen_notify($read_status)
{
    $output = '';
    if($read_status == 0)
    {
    $output = 'color:#717171;';
    }
    else{
    $output = 'font-weight: bold;';
    }
    return $output;
} 
?>