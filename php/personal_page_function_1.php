<?php 

if(isset($_POST['name'])){
    $name = $_POST['name'];

    require_once 'connect.php';

    $query = "SELECT record_id,stuff_id,borrower_id,rating,buyer_status,seller_status FROM stuff_record where stuff_id=any(Select stuff_ID FROM stuff_info where user_account='$name') order by record_id DESC;";
    $result = mysqli_query($conn,$query);
    //buyer 4:未接受交易 3:已接受交易 2:已歸還物品 1:未評價 0:已評價
    //seller 4:未接受交易 3:已接受交易 2:已獲得歸還物品 0:拒絕
    $frame="<div>
                <a class='personal_page_title'>我的租借紀錄</a>
                <div class='personal_page_function'>
                    <a class='mystuff'onclick='show_my_stuff()'>我的商品</a>
                    <a class='cart'onclick='get_perosinal_function_1()'>購物車</a>
                </div>
                <hr class='personal_page_hr'>
            </div>
            <div id='personal_f1_container'>";
    $button_content='';

    if (mysqli_num_rows($result) > 0){
        while($row = $result->fetch_assoc()) {
            $stuff= $row["stuff_id"];
            $record= $row["record_id"];
            $buyer= $row["buyer_status"];   
            $seller= $row["seller_status"];   
            #我是seller 對方buyer 看seller頁面
            if($seller==4 & $buyer==3){
                #我未確認訂單 對方已確認
                $button_content="<a record_id=".$record." onclick='seller_accept(this)'>接受申請</a><a record_id=".$record." onclick='seller_reject(this)'>取消申請</a>";
            }
            else if($seller==3 & $buyer==3){
                #我確認訂單 對方已確認 已交東西給對方
                $button_content="<a record_id=".$record." onclick='seller_check_retake(this)'>未交還商品(點擊確認交還)</a>";
            }
            else if($seller==3 & $buyer==2){
                #我確認訂單 對方已確認 已交東西給對方
                $button_content="<a record_id=".$record." onclick='seller_check_retake(this)'>未交還商品(點擊確認交還)</a>";
            }
            else if($seller==2 & $buyer==3){
                #我收到歸還物品 對方未(按下)歸還 
                $button_content="<a record_id=".$record." onclick=''>等待對方確認中...</a>";
            }
            else if($seller==2 & $buyer<=2){
                # 雙方完成交易
                $button_content="<a record_id=".$record." onclick=''>交易已結束</a>";
            }
            else if($buyer==-1){
                # 雙方完成交易
                $button_content="<a record_id=".$record." onclick=''>買家已取消</a>";
            }
            else if($seller==-1){
                # 雙方完成交易
                $button_content="<a record_id=".$record." onclick=''>已拒絕此訂單</a>";
            }
        
            $query2 = "SELECT stuff_status, stuff_topic, stuff_content, stuff_img_name,user_account FROM stuff_info where stuff_ID ='$stuff';";
            $result2 = mysqli_query($conn,$query2);
            
            foreach($result2 as $row2){
    
    
                $renter_name=get_user_name($row['borrower_id'],$conn);
                $frame.='<div class="personal_f1_item">
                        <div>
                        <img src="uploads/'.$row2["stuff_img_name"].'" alt="" style="width: 150px ; height: 150px;">
                        </div>
                        <div class="personal_f1_item_intro">
                            <a id="personal_f1_record_id">租借記錄編號:'.$row['record_id'] .'</a></br>
                            <a id="personal_f1_stuff_id">商品編號:'.$stuff.'</a></br>
                            <a id="personal_f1_stuff_name">商品名稱:'.$row2['stuff_topic'] .'</a></br>
                            <a id="personal_f1_renter_id">申請人編號:'.$row['borrower_id'] .'</a></br>
                            <a id="personal_f1_renter_name">申請人姓名:'.$renter_name .'</a></br>
                            <a id="personal_f1_record_time">租借時間:'.'時間' .'</a></br>
                        </div>
                        <div class="write_eval">
                            '.$button_content.'
                        </div>
                    </div><hr class="personal_page_f1_hr">';
            }
            
        }
        $frame.="</div>";
    }
    



    echo $frame;
}

/*function get_user_name($user_account,$conn){
    $query = "SELECT user_name FROM user_info where user_account ='$user_account';";
    $result = mysqli_query($conn,$query);

    return $result;
}*/
?>