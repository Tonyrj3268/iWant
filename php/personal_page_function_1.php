<?php 

if(isset($_POST['name'])){
    $name = $_POST['name'];

    require_once 'connect.php';

    $query = "SELECT record_id,stuff_id FROM stuff_record where borrower_id ='$name';";
    $result = mysqli_query($conn,$query);

    $frame="<div>
                <a class='personal_page_title'>我的租借紀錄</a>
                <div></div>
                <hr class='personal_page_hr'>
            </div>
            <div id='personal_f1_container'>";
    
    while($row = $result->fetch_assoc()) {
        $stuff= $row["stuff_id"];        
        $query2 = "SELECT stuff_status, stuff_topic, stuff_content, stuff_img_name,user_account FROM stuff_info where stuff_ID ='$stuff';";
        $result2 = mysqli_query($conn,$query2);
        
        foreach($result2 as $row2){
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
                    <div>
                        <button>評價</button>
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