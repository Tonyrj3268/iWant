<?php 
    require_once 'connect.php';
    
    $category=$_POST['category'];
    //$query = "select * from stuff_info Where stuff_status='$category' ORDER BY stuff_ID desc";
    $query = "select * from stuff_info Where stuff_status='$category' ORDER BY stuff_ID desc";
    
            $result = mysqli_query($conn,$query);
            if ($result){
                if (mysqli_num_rows($result)>=0) {
                    $i =0;
                    while($row = $result->fetch_assoc()) {
                        
                        $i++;
                        echo "<div class='item-item' onclick='showItem(this)' postfrom=".$row["user_account"]. " data-index=" .$row["stuff_ID"]. ">
                        <div style='width:100px;line-height:154px;text-align:center;'>".$i."."."</div>
                        <div><img src = uploads/".$row["stuff_img_name"]." id ='stuff_img'></div>
                        <div style='width:600px;'>
                        <a>物品名稱 : " .  $row["stuff_topic"] . "</a><br>
                        <a>物品編號 : " .  $row["stuff_ID"] . "</a><br>
                        <a>物品描述 : " .  $row["stuff_content"] . "</a><br>
                        <a>出租者 : " .  $row["user_account"] . "</a><br>
                        <a>價格 : " .  $row["stuff_price"] ."/1小時". "</a><br>
                        <a>物品評價 : " . count_rating($row["stuff_ID"],$conn) . "</a><br></div>
                        </div><hr/>";
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

                function count_rating($stuff_id,$conn)
                {
                    $rating = 0;
                    $i=0;
                    $query = "select rating from stuff_record Where stuff_id=".$stuff_id."";
                    $result = mysqli_query($conn,$query);
                    if($result){
                        foreach($result as $row){
                            $i++;
                            $rating.=$row['rating'];
                        }
                    }
                    if($rating==0){
                        return "無";
                    }
                    else{
                        $rating=$rating/$i;
                        $star='';
                        for($i=0;$i<$rating;$i++){
                            $star.="⭐";
                        }

                    return $star;
                    }
                    
                }                 
?>