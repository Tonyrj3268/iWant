<?php 

if(isset($_POST['name'])){
    $name = $_POST['name'];

    require_once 'connect.php';

    $query = "SELECT record_id,stuff_id,rating,buyer_status,seller_status FROM stuff_record where borrower_id ='$name' order by record_id desc;";
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
    
    while($row = $result->fetch_assoc()) {
        $stuff= $row["stuff_id"];
        $buyer= $row["buyer_status"];   
        $seller= $row["seller_status"];   
        $button_content='';
        if($seller==4 & $buyer==3){
            #我未確認訂單 對方已確認
            $button_content="<a record_id=".$row['record_id']." onclick=''>等待對方確認中...</a><a record_id=".$row['record_id']." onclick='buyer_cancel(this)'>取消申請</a>";
        }
        else if($seller==3 & $buyer==3){
            #我確認訂單 對方已確認 已交東西給對方
            $button_content="<a record_id=".$row['record_id']." onclick='buyer_return(this)'>未歸還商品(點擊確認歸還)</a>";
        }
        else if($seller==3 & $buyer==2){
            #我確認訂單 對方已歸還 
            $button_content="<a record_id=".$row['record_id']." onclick=''>等待對方確認中...</a>";
        }
        else if($seller==2 & $buyer==3){
            #我確認訂單 對方已歸還 
            $button_content="<a record_id=".$row['record_id']." onclick='buyer_return(this)'>未歸還商品(點擊確認歸還)</a>";
        }
        else if($seller==2 & $buyer==2){
            # 雙方完成交易
            $button_content="<a record_id=".$row['record_id']." onclick='write_evaluation(this)'>撰寫評價</a>";
        }
        else if($buyer==-1){
            # 雙方完成交易
            $button_content="<a record_id=".$row['record_id']." >已取消</a>";
        }
        else if($seller==-1){
            # 雙方完成交易
            $button_content="<a record_id=".$row['record_id']." >已取消</a>";
        }
        


        $query2 = "SELECT stuff_status, stuff_topic, stuff_content, stuff_img_name,user_account FROM stuff_info where stuff_ID ='$stuff';";
        $result2 = mysqli_query($conn,$query2);
        
        foreach($result2 as $row2){
            
            if($row['rating']!=null){  
                $button_content="<a record_id=".$row['record_id'].">已評價</a>";
            }
            $renter_name=get_user_name($row2['user_account'],$conn);
            $frame.='<div class="personal_f1_item">
                    <div>
                    <img src="uploads/'.$row2["stuff_img_name"].'" alt="" style="width: 150px ; height: 150px;">
                    </div>
                    <div class="personal_f1_item_intro">
                        <a id="personal_f1_record_id">租借記錄編號:'.$row['record_id'] .'</a></br>
                        <a id="personal_f1_stuff_id">商品編號:'.$stuff.'</a></br>
                        <a id="personal_f1_stuff_name">商品名稱:'.$row2['stuff_topic'] .'</a></br>
                        <a id="personal_f1_renter_id">出租人編號:'.$row2['user_account'] .'</a></br>
                        <a id="personal_f1_renter_name">出租人姓名:'.$renter_name .'</a></br>
                        <a id="personal_f1_record_time">租借時間:'.'時間' .'</a></br>
                    </div>
                    <div class="write_eval">
                        '.$button_content.'
                    </div>
                </div>';
        }
        
    }
    $frame.="</div>";

    echo $frame;
}

/*function get_user_name($user_account,$conn){
    $query = "SELECT user_name FROM user_info where user_account ='$user_account';";
    $result = mysqli_query($conn,$query);

    return $result;
}*/
?>