<?php
require_once 'connect.php';
$record_id = $_POST['record_id'];
$user_id = $_COOKIE['name'];
$score = $_POST['score'];
$content = $_POST['content'];

$query = "UPDATE stuff_record SET rating = '$score', evaluation = '$content' WHERE record_id = '$record_id' and borrower_id='$user_id'";

$result = mysqli_query($conn,$query);

if($result)
{
    if(send_notify_to_seller($record_id,$user_id,$conn)){
        echo 'success';
    }
   
}
else{
    echo 'fail';
    //echo "fail";
}

function send_notify_to_seller($record_id,$buyer_id,$conn){
    $topic='賣家('.$buyer_id.')對您的商品(訂單編號:'.$record_id.')給出評價';
    $content='賣家('.$buyer_id.')已收回商品(訂單編號:'.$record_id.')，感謝您使用本服務，歡迎您至<個人頁面><購物車>為商品進行評價!';    

    $query = "
    INSERT INTO sys_notify 
    (sys_title, sys_msg,to_user_id, read_status) 
    VALUES ('$topic','$content',".find_seller_ID($record_id,$conn).",'1')
    ";

    $result = mysqli_query($conn,$query);
    return $result;

}
function find_seller_ID($record_id,$conn){
    $query ='SELECT user_account FROM stuff_info where stuff_ID=(SELECT stuff_id FROM stuff_record where record_id='.$record_id.')';
    $result = mysqli_query($conn,$query);

    if (mysqli_num_rows($result) > 0) {
        // 输出数据
        while($row = mysqli_fetch_assoc($result)) {
            return $row["user_account"];
        }
    } else {
        echo "0 结果";
    }
}
?>