<?php
    $account=$_POST['account'];
    $password=$_POST['password'];
    
    $email=$_POST['email'];
    $name=$_POST['name'];
    $dep=$_POST['department'];
    $stu_ID=$_POST['stu_ID'];
    $others=$_POST['others'];
    require_once 'connect.php';
    if(empty($name)){
        echo "name is required";
    }
    else if(empty($dep)){
        echo "department is required";
    }
    else if(empty($stu_ID)){
        echo "student ID is required";
    }
    else if(empty($_FILES['img']['name'])){
        

        $query = "SELECT user_stu_ID FROM user_info where user_stu_ID = '$stu_ID'";
        $result = mysqli_query($conn,$query);
        if(mysqli_num_rows($result)==0){
            $query = "insert into user_info(user_account,user_password,user_email,user_name,user_dep,user_stu_ID,user_others) values('$account','$password','$email','$name','$dep','$stu_ID','$others')";
            $result = mysqli_query($conn,$query);
            if($result){
                echo "accept";}
            else{
                echo "register fail";
            }
        }
        else{
            echo "already have this student ID";
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
    
                    $query = "insert into user_info(user_account,user_password,user_email,user_name,user_dep,user_stu_ID,user_img_name,user_others) values('$account','$password','$email','$name','$dep','$stu_ID','$new_img_name','$others')";
                    $result = mysqli_query($conn,$query);
                    if ($result){
                        echo "accept";
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
  
?>    