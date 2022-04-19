<?php
    $account=$_POST['account'];
    $password=$_POST['password'];
    $email=$_POST['email'];
    $name=$_POST['name'];
    $dep=$_POST['department'];
    $stu_ID=$_POST['stu_ID'];

    if(empty($name)){
        echo "name is required";
    }
    else if(empty($dep)){
        echo "department is required";
    }
    else if(empty($stu_ID)){
        echo "student ID is required";
    }
    else{
        require_once 'connect.php';

        $query = "SELECT user_stu_ID FROM user_info where user_stu_ID = '$stu_ID'";
        $result = mysqli_query($conn,$query);
        if(mysqli_num_rows($result)==0){
            $query = "insert into user_info(user_account,user_password,user_email,user_name,user_dep,user_stu_ID) values('$account','$password','$email','$name','$dep','$stu_ID')";
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
  
?>    