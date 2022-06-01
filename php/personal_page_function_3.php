<?php 

if(isset($_POST['name'])){
    $name = $_POST['name'];

    require_once 'connect.php';

    $query = "SELECT * FROM user_info where user_account ='$name';";
    $result = mysqli_query($conn,$query);

    $frame="<div>
                <a class='personal_page_title'>我的個人資料</a>
                <div></div>
                <hr class='personal_page_hr'>
            </div>
            <div id='personal_f3_container'>";
    
    while($row = $result->fetch_assoc()) {

        $pic='uploads/default-image.jpg';
        if($row['user_img_name']!=null){
            $pic='uploads/'.$row['user_img_name'];
        }
            #$renter_name=get_user_name($row['user_account'],$conn);
            $frame.='<form id="personal_f3_form" action="./edit_personal_info.php" method="post">
                    <div class="personal_f3_item">
                    <div>
                    <button style="width: 100px; height: 100px" id="upload">
                        <input id="personal_f3_personal_img" type="file" name="img" onchange="readURL(this)" targetID="preview_img">
                        <img src="'.$pic.'" alt="" id="preview_img">
                    </button> 
                    </div>
                    <div class="personal_f3_personal_intro">
                        <a>帳號:</a></br><input id="personal_f3_personal_ID"  name="status" value='.$row['user_account'].' disabled="disabled"></input></br>
                        <a>暱稱:</a></br><input id="personal_f3_personal_name"  name="status" value='.$row['user_name'].'></input></br>
                        <a>學號:</a></br><input id="personal_f3_personal_stu_ID"  name="status" value='.$row['user_stu_ID'] .' disabled="disabled"></input></br>
                        <a>註冊之電子信箱:</a></br><input id="personal_f3_personal_email" type="email" name="status" value='.$row['user_email'] .' disabled="disabled"></input></br>
                        <a>系所:</a></br><input id="personal_f3_personal_dep"  name="status" value='.$row['user_dep'] .'></input></br>
                        <a>額外聯絡方式:</a></br><input id="personal_f3_personal_others"  name="status" value='.$row['user_email'] .'></input></br>
                        
                    </div>
                    <div>
                        <a onclick="update_info()">修改</a>
                    </div>
                </div></form>';
        
        
    }
    $frame.="</div>";

    echo $frame;
}