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
            $query = "UPDATE stuff_info SET stuff_status = '$rent_borrow', stuff_topic = '$topic', stuff_content = '$content', stuff_price = '$price', stuff_place = '$place'WHERE user_account = '$user_account'";
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
                if($img_size > 1000000){
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
        
                        $query = "UPDATE stuff_info SET stuff_status = '$rent_borrow', stuff_img_name = '$new_img_name', stuff_topic = '$topic', stuff_content = '$content', stuff_price = '$price', stuff_place = '$place'WHERE user_account = '$user_account'";
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