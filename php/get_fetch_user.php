<?php

require_once 'connect.php';
//超醜的query
$query = "
SELECT t1.* 
FROM (SELECT * FROM user_chat WHERE user_id='".$_COOKIE['name']."'
	union
	SELECT chat_index,to_user_id,chat_msg,user_id,chat_timestamp,status FROM user_chat WHERE to_user_id='".$_COOKIE['name']."') as t1,
    (SELECT user_id,to_user_id,MAX( chat_timestamp ) as chat_timestamp
    from (SELECT * FROM user_chat WHERE user_id='".$_COOKIE['name']."'
	union
	SELECT chat_index,to_user_id,chat_msg,user_id,chat_timestamp,status FROM user_chat WHERE to_user_id='".$_COOKIE['name']."')as t3
    where user_id='".$_COOKIE['name']."'
    group by to_user_id) as t2
    where t1.chat_timestamp = t2.chat_timestamp 
    order by t1.chat_timestamp desc;";
$result = mysqli_query($conn,$query);


$output ='<div class="sys_page_intro">
<div>
    <a>我的訊息</a>
</div>
</div>
<div class="sys_page_notifys">';
foreach($result as $row)
{
    $query2 = "
    SELECT user_name,user_account ,user_img_name FROM user_info 
    WHERE user_account = '".$row['to_user_id']."' 
    ";
    
    $result2 = mysqli_query($conn,$query2);
    $pic='uploads/person.jpg';
        
    if (mysqli_num_rows($result2) > 0) {
        while($row2 = mysqli_fetch_assoc($result2)) {
            /*$output .= '
            <tr class="start_chat" data-touserid="'.$row['to_user_id'].'" data-tousername="'.$row2['user_name'].'">
            <td>'.$row2['user_name'].' '.$row['chat_msg'].''.count_unseen_message($_COOKIE['name'], $row['to_user_id'], $conn).'</td>
            </tr>
            ';*/
            if($row2['user_img_name']!=null){
                $pic='uploads/'.$row2['user_img_name'];
            }
            $output .= '
            <div class="notify start_chat" data-touserid="'.$row['to_user_id'].'" data-tousername="'.$row2['user_name'].'" style="'.count_unseen_notify(count_unseen_message($_COOKIE['name'], $row['to_user_id'], $conn)).'">
            <img src="'.$pic.'"style="width: 50px ; height: 50px;border-radius:50px;margin-right:10px;">
            <div class="chat_msg">
            <a>'.$row2['user_name'].'( '.$row2['user_account'].' )</a>
            <a>'.$row['chat_msg'].'</a>
            </div>
            <a>'.count_unseen_message($_COOKIE['name'], $row['to_user_id'], $conn).'</a>
            </div>';
        }
    } else {
        echo "0 结果";
    }
    
}

$output .= '</div>';

echo $output;

function count_unseen_notify($read_status)
{
    $output = '';
    if($read_status == '')
    {
    $output = 'color:#717171;';
    }
    else{
    $output = 'font-weight: bold;';
    }
    return $output;
} 
?>