<?php
    
    if(isset($_POST['account']) && isset($_POST['password'])){
        require_once 'connect.php';
   
        $account=$_POST['account'];
        $password=$_POST['password'];

        if(empty($account)){
            echo "請輸入帳號";
        }
        else if(empty($password)){
            echo "請輸入密碼";
        }
        else{
            $query = "SELECT user_account, MD5(UNIX_TIMESTAMP() + user_account + RAND(UNIX_TIMESTAMP()))
                user_incession FROM user_info where user_account = '$account' AND user_password= '$password'";
            //$query = "select * from user_info where user_account = '$account' and user_password='$password'";
            $result = mysqli_query($conn,$query);
            if ($result){
                if (mysqli_num_rows($result)) {
                    $row = mysqli_fetch_row($result);
                    // Update the user record
                    $query = "UPDATE user_info SET user_incession = '$row[1]' WHERE user_account = '$row[0]'";
                    $result2 = mysqli_query($conn,$query);
        	        /*if($result2){
                        $cookieexpiry = (time() + 21600);
                        setcookie("user_incession", "'$row[1]'", $cookieexpiry);
                        
                    }*/
                    // set cookie
                    $NewArray=array('res' => "success", 'incession' => $row[1]);
                    $json = json_encode($NewArray); 
                    echo $json;
                }
                else{
                    echo "fail";
                }
                }
            else{
                die('Error: ' + mysqli_error($conn));//如果sql執行失敗輸出錯誤
                }
    
            }
        }
    
    else{
        header("Location: index.php");
        exit();
    }
    

?>