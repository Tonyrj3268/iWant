<?php 
    require_once 'connect.php';
    $category=$_POST['category'];
    $query = "select stuff_ID,stuff_status,stuff_topic,user_account from stuff_info Where stuff_status='$category' ORDER BY stuff_ID desc";
            $result = mysqli_query($conn,$query);
            if ($result){
                if (mysqli_num_rows($result)>0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<div class='item-item' onclick='showItem(this)' postfrom=".$row["user_account"]. " data-index=" .$row["stuff_ID"]. "><a>" . $row["stuff_status"] . " : " .  $row["stuff_topic"] . "</a></div>";
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