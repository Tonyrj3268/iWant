<?php 
    require_once 'connect.php';
    
    $who_change=$_POST['who_change'];
    $record_id=$_POST['record_id'];

    if($who_change=='seller'){
        $query = "select seller_status,borrower_id from stuff_record where record_id=$record_id";
        $result = mysqli_query($conn,$query);

        if (mysqli_num_rows($result)>0) {
            while($row = $result->fetch_assoc()) {
                $status=-1;
                $query2 = "update stuff_record set seller_status=".$status." where record_id=$record_id";
                $result2 = mysqli_query($conn,$query2);
                
                if(send_notify_to_buyer($record_id,$row['borrower_id'],$status,$conn)){
                    
                    echo 'success';
                }
                else{
                    echo 'fail';
                }
                
            }
            
        }
        else{
        header("location: ../index.php?error=資料庫連結錯誤");
        exit();
        }
    }
    else{
        $query = "select buyer_status,borrower_id from stuff_record where record_id=$record_id";
        $result = mysqli_query($conn,$query);

        if ($result){
            if (mysqli_num_rows($result)>0) {
                while($row = $result->fetch_assoc()) {
                    $status=-1;
                    $query2 = "update stuff_record set buyer_status=".$status." where record_id=$record_id";
                    $result2 = mysqli_query($conn,$query2);
                    
                    if(send_notify_to_seller($record_id,$row['borrower_id'],$status,$conn)){
                    
                        echo 'success';
                    }
                    else{
                        echo 'fail';
                    }
                }
                
            }
            else{
            header("location: ../index.php?error=資料庫連結錯誤");
            exit();
            }
            }
        else{
            die('Error: ' + mysqli_error($conn));//如果sql執行失敗輸出錯誤
            }
    }

    function send_notify_to_buyer($record_id,$to_user_id,$status,$conn){
        $topic='';
        $content='';
        switch($status){
            case 4:
                $topic='賣家('.find_seller_ID($record_id,$conn).')已接受您的訂單(訂單編號:'.$record_id.')';
                $content='賣家('.find_seller_ID($record_id,$conn).')已接受您的訂單(訂單編號:'.$record_id.')，請盡快與賣家聯絡';
                break;
            case -1:
                $topic='賣家('.find_seller_ID($record_id,$conn).')已拒絕您的訂單(訂單編號:'.$record_id.')';
                $content='賣家('.find_seller_ID($record_id,$conn).')已拒絕您的訂單(訂單編號:'.$record_id.')，若需要，請與賣家聯絡';
                break;   
        }
        $query = "
        INSERT INTO sys_notify 
        (sys_title, sys_msg,to_user_id, read_status) 
        VALUES ('$topic','$content','$to_user_id','1')
        ";

        $result = mysqli_query($conn,$query);
        return $result;

    }

    function send_notify_to_seller($record_id,$buyer_id,$status,$conn){
        $topic='';
        $content='';
        switch($status){
            case 3:
                $topic='買家('.$buyer_id.')已歸還您的商品(訂單編號:'.$record_id.')，請確認';
                $content='買家('.$buyer_id.')已歸還您的商品(訂單編號:'.$record_id.')，請確認，若已收到您的商品，請至<個人頁面><我的商品>按下確認歸還按鈕，若對方尚未歸還商品，請盡快聯絡買家或本系統客服。';   
                break;
            case -1:
                $topic='買家('.find_seller_ID($record_id,$conn).')已取消訂單(訂單編號:'.$record_id.')';
                $content='買家('.find_seller_ID($record_id,$conn).')已取消訂單(訂單編號:'.$record_id.')';
                break;  
        }
        $query = "
        INSERT INTO sys_notify 
        (sys_title, sys_msg,to_user_id, read_status) 
        VALUES ('$topic','$content','".find_seller_ID($record_id,$conn)."','1')
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