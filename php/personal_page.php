<?php 

if(isset($_POST['name'])){
    $name = $_POST['name'];

    require_once 'connect.php';

    $query = "SELECT user_name,user_dep, user_stu_ID, user_email FROM user_info where user_account ='$name';";
    $result = mysqli_query($conn,$query);
    if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_row($result);
        /*echo '<img src="uploads/default-image.jpg" alt="" style="width: 100px ; height: 100px;">
                <a>稱呼:</a><a id=\'personal_name\'>'.$row[0] .'</a>
                <a>系級:</a><a href="">'.$row[1] .'</a>
                <a>學號:</a><a href="">'.$row[2] .'</a>
                <a>聯絡方式:</a><a href="">'.$row[3] .'</a>
                <a>租借紀錄:</a><a href=""></a>';*/
        echo '<div id="personal_page_intro_card">
                <div>
                    <img src="uploads/default-image.jpg" alt="" style="width: 100px ; height: 100px;">
                </div>
                <div>
                    <a id="personal_name">'.$row[0] .'</a></br>
                    <a id="personal_email">'.$row[3] .'</a>
                </div>
            </div>
            <div id="personal_page_functions">
                <div id="personal_page_function_1">
                <a onclick="get_perosinal_function_1()">我的租借紀錄</a>
                </div>
                <div id="personal_page_function_2">
                    <a onclick="get_perosinal_function_2()">編輯個人商品</a>
                </div>
                <div id="personal_page_function_3">
                    <a onclick="get_perosinal_function_3()">編輯個人資料</a>
                </div>
            </div>
            ';
    }
    else{
        echo '無資料';
    }
}

?>