<?php
    
    if(isset($_POST['topic']) && isset($_POST['content'])){
        require_once 'connect.php';
   
        $topic=$_POST['topic'];
        $content=$_POST['content'];
        $user_account=$_COOKIE['name'];
        $price=$_POST['price'];
        $place=$_POST['place'];
        $rent_borrow=$_POST['rent_borrow'];
        if(empty($topic)){
            echo 'topic is required';
        }
        else if(empty($content)){
            echo 'content is required';
        }
        else if(empty($price)){
            echo 'price is required';
        }
        else if(empty($place)){
            echo 'place is required';
        }
        else if(empty($rent_borrow)){
            echo 'select rent or borrow';
        }

        else if(empty($_FILES['img']['name'])){
            $query = "insert into stuff_info(stuff_status, stuff_topic, stuff_content, stuff_price, stuff_place, user_account) values('$rent_borrow','$topic','$content','$price','$place','$user_account')";
            $result = mysqli_query($conn,$query);
            if ($result){
                echo 'success';
                exit();
                }
            else{
                echo 'database connect fail';
                die('Error: ' . mysqli_error($conn));//如果sql執行失敗輸出錯誤
                }
    
            }
        else{
            $img_name = $_FILES['img']['name'];
            $img_size = $_FILES['img']['size'];
            $tmp_name = $_FILES['img']['tmp_name'];
            $error = $_FILES['img']['error'];
            if($error === 0){
                if($img_size > 10000000){
                    echo 'sorry, your file is too large';
                }
                else{
                    //get the file's path info
                    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
        
                    $img_ex_lc = strtolower($img_ex);
                    //creat an array that stores allowe
                    $allowed_exs = array('jpg','jpeg','png','jfif');
        
                    if(in_array($img_ex_lc,$allowed_exs)){
                        //rename the img name with random string
                        $new_img_name = uniqid("IMG-",true) . '.' . $img_ex_lc;
        
                        $img_upload_path = "../uploads/" . $new_img_name;
        
                        move_uploaded_file($tmp_name, $img_upload_path);
        
                        $query = "insert into stuff_info(stuff_status, stuff_topic, stuff_content, stuff_img_name, stuff_price, stuff_place, user_account) values('$rent_borrow','$topic','$content','$new_img_name','$price','$place','$user_account')";
                        $result = mysqli_query($conn,$query);
                        if ($result){
                            $em = $result;
                            $res = array('res' => 0, 'src' => $new_img_name);
        
                            echo 'success';
                            exit();
                        }
                        else{
                        die('Error: ' . mysqli_error($conn));//如果sql執行失敗輸出錯誤
                        }
                    } 
                    else{
                        echo 'you can not upload file of this type';
                    }
                }
        
            }
            else{
                echo 'unknown error occured';
            }
        }    
        }
    
    else{
       echo 'unknown error occured';
    }
    
?>