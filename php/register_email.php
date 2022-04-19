<?php
    $email=$_POST['email'];

    if(empty($email)){
        echo "email is required";
    }
    else{
        require_once 'connect.php';

        $query = "SELECT user_email FROM user_info where user_email = '$email'";
        $result = mysqli_query($conn,$query);
        if(mysqli_num_rows($result)==0){
            echo "accept";
        }
        else{
            echo "already have this email";
        }

    }
  
?>    