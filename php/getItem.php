<?php 
    require_once 'connect.php';

    $item=$_POST['item'];
    $query = "SELECT stuff_status,stuff_topic,stuff_content,stuff_img_name,stuff_price,stuff_place,user_account FROM stuff_info where stuff_ID ='$item';";
            $result = mysqli_query($conn,$query);
            if ($result){
                if (mysqli_num_rows($result)>0) {
                    while($row = $result->fetch_assoc()) {
                        if($row["stuff_img_name"]){
                            echo '<a>Status: '.$row["stuff_status"] .'</a><input type="hidden" name="status" value='.$row["stuff_status"] .'></input><br>
                                <a name="topic">Topic: '.$row["stuff_topic"] .'</a><input type="hidden" name="topic" value='.$row["stuff_topic"] .'></input><br>
                                <a name="content">Content: '.$row["stuff_content"] .'</a><input type="hidden" name="content" value='.$row["stuff_content"] .'></input><br>
                                <img src = "uploads/'.$row["stuff_img_name"].'" id ="stuff_img"><input type="hidden" name="img" value='.$row["stuff_img_name"] .'></input><br>
                                <a name="price">Price: '.$row["stuff_price"] .'</a><input type="hidden" name="price" value='.$row["stuff_price"] .'></input><br>
                                <a name="place">Place: '.$row["stuff_place"] .'</a><input type="hidden" name="place" value='.$row["stuff_place"] .'></input><br>
                                <a id="user_name" name="user">From: '.$row["user_account"] .'</a><input type="hidden" name="user" value='.$row["user_account"] .'></input><br>
                                <p>Date:<input type="text" class="datepicker" id="datepicker" placeholder="請選擇日期"></p><br>
                                <p>Time:<input type="text" id="datetimepicker" placeholder="請選擇時間"></p><br>
                                ';
                        }
                        else{
                                echo '<a>Status: '.$row["stuff_status"] .'</a><input type="hidden" name="status" value='.$row["stuff_status"] .'></input><br>
                                <a name="topic">Topic: '.$row["stuff_topic"] .'</a><input type="hidden" name="topic" value='.$row["stuff_topic"] .'></input><br>
                                <a name="content">Content: '.$row["stuff_content"] .'</a><input type="hidden" name="content" value='.$row["stuff_content"] .'></input><br>
                                <img src = "uploads/default-image.jpg" id ="stuff_img"><input type="hidden" name="img" value="uploads/default-image.jpg"></input><br>
                                <a name="price">Price: '.$row["stuff_price"] .'</a><input type="hidden" name="price" value='.$row["stuff_price"] .'></input><br>
                                <a name="place">Place: '.$row["stuff_place"] .'</a><input type="hidden" name="place" value='.$row["stuff_place"] .'></input><br>
                                <a id="user_name" name="user">From: '.$row["user_account"] .'</a><input type="hidden" name="user" value='.$row["user_account"] .'></input><br>
                                <p>Date:<input type="text" class="datepicker" id="datepicker"placeholder="請選擇日期"></p><br>
                                <p>Time:<input type="text" id="datetimepicker" placeholder="請選擇時間"></p><br>';
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

?>