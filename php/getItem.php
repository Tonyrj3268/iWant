<?php 
    require_once 'connect.php';

    $item=$_POST['item'];
    $query = "SELECT stuff_ID,stuff_status,stuff_topic,stuff_content,stuff_img_name,stuff_price,stuff_place,user_account,stuff_category FROM stuff_info where stuff_ID ='$item';";
            $result = mysqli_query($conn,$query);
            if ($result){
                if (mysqli_num_rows($result)>0) {
                    while($row = $result->fetch_assoc()) {
                        if($row["stuff_img_name"]){
                            $status='出租';
                            
                            if($row["stuff_status"]=="borrow"){
                                $status='求借';
                            }
                            echo '<div style="display:flex;flex-direction: row;">
                                        
                                        <img src = "uploads/'.$row["stuff_img_name"].'" id ="stuff_img" style="width:200px;height:200px;"><input type="hidden" name="img" value='.$row["stuff_img_name"] .'></input><br>
                                        <div style="display:flex;flex-direction: column;">
                                        <a>狀態: '.$status.'</a><input type="hidden" name="status" value='.$row["stuff_status"] .'></input><br>
                                        <a name="topic">物品名稱: '.$row["stuff_topic"] .'</a><input type="hidden" name="topic" value='.$row["stuff_topic"] .'></input><br>
                                        <a name="id">物品編號: '.$row["stuff_ID"] .'</a><input type="hidden" name="id" value='.$row["stuff_ID"] .'></input><br>
                                        <a name="content">物品描述: '.$row["stuff_content"] .'</a><input type="hidden" name="content" value='.$row["stuff_content"] .'></input><br>
                                        <a id="user_name" name="user" onclick="chat('.$row["user_account"] .')">出租者(點擊前往聊天): '.get_user_name($row["user_account"], $conn).'('.$row["user_account"] .')</a><input type="hidden" name="user" value='.$row["user_account"] .'></input><br>
                                        <a name="price">價格: '.$row["stuff_price"] .'</a><input type="hidden" name="price" value='.$row["stuff_price"] .'></input><br>
                                        <input type="hidden" name="category" value='.$row["stuff_category"] .'></input>
                                        <input type="text" style="widht:1px;height:1px;opacity: 0;"><br>
                                        </div>
                                        
                                    </div>
                                
                                ';
                                //<p>Date:<input type="text" class="datepicker" id="datepicker" placeholder="請選擇日期"></p><br>
                                //<p>Time:<input type="text" id="datetimepicker" placeholder="請選擇時間"></p><br>
                        }
                        else{
                            $status='出租';
                            
                            if($row["stuff_status"]=="borrow"){
                                $status='求借';
                            }
                                
                                echo '<div style="display:flex;flex-direction: row;">
                                        
                                        <img src = "uploads/default-image.jpg" id ="stuff_img" style="width:200px;height:200px;"><input type="hidden" name="img" value="uploads/default-image.jpg"></input><br>
                                        <div style="display:flex;flex-direction: column;">
                                        <a>狀態: '.$status.'</a><input type="hidden" name="status" value='.$row["stuff_status"] .'></input><br>
                                        <a name="topic">物品名稱: '.$row["stuff_topic"] .'</a><input type="hidden" name="topic" value='.$row["stuff_topic"] .'></input><br>
                                        <a name="id">物品編號: '.$row["stuff_ID"] .'</a><input type="hidden" name="id" value='.$row["stuff_ID"] .'></input><br>
                                        <a name="content">物品描述: '.$row["stuff_content"] .'</a><input type="hidden" name="content" value='.$row["stuff_content"] .'></input><br>
                                        <a id="user_name" name="user" onclick="chat('.$row["user_account"] .')">出租者(點擊前往聊天): '.get_user_name($row["user_account"], $conn).'('.$row["user_account"] .')</a><input type="hidden" name="user" value='.$row["user_account"] .'></input><br>
                                        <a name="price">價格: '.$row["stuff_price"] .'</a><input type="hidden" name="price" value='.$row["stuff_price"] .'></input><br>
                                        <input type="hidden" name="category" value='.$row["stuff_category"] .'></input>
                                        <input type="text" style="widht:1px;height:1px;opacity: 0;"><br>
                                        </div>
                                        
                                    </div>
                                
                                ';
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