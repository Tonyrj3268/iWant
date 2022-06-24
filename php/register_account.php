<?php
    $account=$_POST['account'];
    $password=$_POST['password'];
    $repassword=$_POST['repassword'];

    if(empty($account)){
        echo "請輸入帳號";
    }
    else if(empty($password)){
        echo "請輸入密碼";
    }
    else if(empty($repassword)){
        echo "請輸入第二次密碼";
    }
    else if($password != $repassword){
        echo "請檢查兩次密碼是否輸入相同";
    }
    else{
        require_once 'connect.php';

        $query = "SELECT user_account FROM user_info where user_account = '$account'";
        $result = mysqli_query($conn,$query);
        if(mysqli_num_rows($result)==0){
            echo "accept";
        } 
        else{
            echo "此帳號已被使用";
        }

    }
  
?>    