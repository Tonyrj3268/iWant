<?php 
    
    if(isset($_FILES['img']) && isset($_POST['index'])) { 
    $img_index = $_POST['index'];
    $img_name = $_FILES['img']['name'];
    $img_size = $_FILES['img']['size'];
    $tmp_name = $_FILES['img']['tmp_name'];
    $error = $_FILES['img']['error'];

    if($error === 0){
        if($img_size > 1000000){
            res_error('sorry, your file is too large');
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

                require_once 'connect.php';
                $query =("UPDATE stuff_info SET stuff_img_name='$new_img_name' WHERE stuff_ID = '$img_index'");
                $result = mysqli_query($conn,$query);
                if ($result){
                    $em = $result;
                    $res = array('res' => 0, 'src' => $new_img_name);

                    echo json_encode($res);
                    exit();
                }
                else{
                die('Error: ' . mysqli_error($conn));//如果sql執行失敗輸出錯誤
                }
            } 
            else{
                res_error('you can not upload file of this type');
            }
        }

    }
    else{
        res_error('unknown error occured');
    }
    }

    function res_error($res){
        $em = $res;
        $error = array('error' => 1, 'em' => $em);

        echo json_encode($error);
        exit();
    }
?>