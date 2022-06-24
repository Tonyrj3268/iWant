<?php 
    require_once 'connect.php';
    
    $category=$_POST['category'];
    $status=$_POST['status'];

    $return= array();
    if($category==0){
        $query = "select * from stuff_info Where stuff_status='$status' ORDER BY stuff_ID desc";
    }
    else{
        $query = "select * from stuff_info Where stuff_status='$status' and stuff_category=$category ORDER BY stuff_ID desc";
    }
            $result = mysqli_query($conn,$query);
            if ($result){
                if (mysqli_num_rows($result)>=0) {
                    $i =0;
                    while($row = $result->fetch_assoc()) {
                        $i++;
                        if($row["stuff_status"]=="rent"){
                            echo $row["stuff_topic"];
                        }
                        else{
                            echo $row["stuff_topic"];
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