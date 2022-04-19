<?php 

if(isset($_POST['name'])){
    $name = $_POST['name'];

    require_once 'connect.php';

    $query = "SELECT user_name,user_dep, user_stu_ID, user_email FROM user_info where user_account ='$name';";
    $result = mysqli_query($conn,$query);
    if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_row($result);
        echo '<img src="uploads/default-image.jpg" alt="" style="width: 100px ; height: 100px;">
                <a>稱呼:</a><a href="" id=\'personal_name\'>'.$row[0] .'</a>
                <a>系級:</a><a href="">'.$row[1] .'</a>
                <a>學號:</a><a href="">'.$row[2] .'</a>
                <a>聯絡方式:</a><a href="">'.$row[3] .'</a>
                <a>租借紀錄:</a><a href=""></a>';
    }
    else{
        echo '無資料';
    }
}

?>