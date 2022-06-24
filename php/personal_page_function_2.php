<?php 

if(isset($_POST['name'])){
    $name = $_POST['name'];

    require_once 'connect.php';

    $query = "SELECT stuff_ID,stuff_status, stuff_topic, stuff_content,stuff_price,stuff_place, stuff_img_name,user_account,stuff_category FROM stuff_info where user_account ='$name';";
    $result = mysqli_query($conn,$query);

    $frame="<div>
                <a class='personal_page_title'>編輯個人商品</a>
                <div></div>
                <hr class='personal_page_hr'>
            </div>
            <div id='personal_f2_container'>";
    
    while($row = $result->fetch_assoc()) {
        
            $renter_name=get_user_name($row['user_account'],$conn);
            $frame.='<form id="form" action="./edit_item.php" method="post">
                    <div class="personal_f2_item">
                    <div>
                    <img src="uploads/'.$row["stuff_img_name"].'" alt="" style="width: 150px ; height: 150px;"><input type="hidden" name="img" value='.$row["stuff_img_name"] .'></input>
                    </div>
                    <div class="personal_f2_item_intro">
                        <a id="personal_f2_stuff_status">商品狀態:'.$row['stuff_status'].'</a><input type="hidden" name="status" value='.$row["stuff_status"] .'></input></br>
                        <a id="personal_f2_stuff_id">商品編號:'.$row['stuff_ID'].'</a></br><input type="hidden" name="id" value='.$row["stuff_ID"] .'></input>
                        <a id="personal_f2_stuff_name">商品名稱:'.$row['stuff_topic'] .'</a><input type="hidden" name="topic" value='.$row["stuff_topic"] .'></input></br>
                        <input type="hidden" name="content" value='.$row["stuff_content"] .'></input>
                        <a id="personal_f2_stuff_name">商品價格:'.$row['stuff_price'] .'</a><input type="hidden" name="price" value='.$row["stuff_price"] .'></input>
                        <input type="hidden" name="place" value='.$row["stuff_place"] .'></input>
                        <input type="hidden" name="user" value='.$row["user_account"] .'></input>
                        <input type="hidden" name="category" value='.$row["stuff_category"] .'></input>
                    </div>
                    <div>
                        <button>修改</button>
                    </div>
                </div><hr class="personal_page_f1_hr"></form>';
        
        
    }
    $frame.="</div>";

    echo $frame;
}