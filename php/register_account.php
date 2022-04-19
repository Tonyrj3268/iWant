<?php
    $account=$_POST['account'];
    $password=$_POST['password'];
    $repassword=$_POST['repassword'];

    if(empty($account)){
        echo "account is required";
    }
    else if(empty($password)){
        echo "password is required";
    }
    else if(empty($repassword)){
        echo "repassword is required";
    }
    else if($password != $repassword){
        echo "check password and repassword";
    }
    else{
        require_once 'connect.php';

        $query = "SELECT user_account FROM user_info where user_account = '$account'";
        $result = mysqli_query($conn,$query);
        if(mysqli_num_rows($result)==0){
            echo "accept";
        }
        else{
            echo "already have this account";
        }

    }
  
?>    