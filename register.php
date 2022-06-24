<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>註冊</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js" integrity="sha512-AIOTidJAcHBH2G/oZv9viEGXRqDNmfdPVPYOYKGy3fti0xIplnlgMHUGfuNRzC6FkzIo0iIxgFnr9RikFxK+sw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://kit.fontawesome.com/0999d15b7c.js" crossorigin="anonymous"></script>
    <script src="./js/register.js"></script>
    
</head>
<body>

    <div class='loginframe' style="display: none;">
        <form id="form" action="./php/login.php" method="post">
        <p class="validateTips">提示</p>
        <div>
            帳號: <input id='account' name="account" type="text" placeholder="請輸入帳號"><br>
            密碼: <input id='password' name="password" type="password" placeholder="請輸入密碼" autocomplete="off"><br>
            <a href="register.php">還沒有帳號嗎?</a>
        </div>

        <?php if(isset($_GET['error'])){ ?>
            <p class="error" style="background-color: red;"><?php echo $_GET['error'] ?></p>
        <?php } ?>
        </form>
    </div>
    <!-- <div id="header-bar">
        <a href="index.php">首頁</a>
        <a onclick="goSysNotify()">通知</a>
        <a onclick="goMsg()">訊息</a>
        <a onclick="goPersonalPage()">個人頁面</a>
        <a id="login" onclick="$('.loginframe').dialog('open');">登入/註冊</a>
    </div> -->
    <div id="header-bar">
            <a href="./index.php"><img class="logo", src="https://upload.cc/i1/2022/05/26/eKBEus.png", onclick=""></a>
            <div class="search">
                 <input class="search-bar" type="text" name="search" id="search" placeholder="功能停用">
                 <button class="search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
            <div class="btn">
                <div class="notice"><a onclick="goSysNotify()"><i class="fa-solid fa-bell"></i></a></div>
                <div class="message"><a onclick="goMsg()"><i class="fa-solid fa-message"></i></a></div>
                <div class="personal"><a onclick="goPersonalPage()"><i class="fa-solid fa-user"></i></a></div>
                <div class="login"><a id="login" onclick="$('.loginframe').dialog('open');"><i class="fa-solid fa-right-to-bracket",style="padding-right=5%"></i>Login</a></div>
            </div>
    </div>
    <div class="cover"></div>
    
    <form id="form-register" action="##" method="post">
        <div class="share_Panel" id="account_panel">
            <img class="register_logo" src="https://upload.cc/i1/2022/05/26/eKBEus.png" onclick="">
            <a>以你的政大信箱註冊</a>
            <input id='reg_account' name="account" type="text" placeholder="請輸入帳號">
            <input id='reg_password' name="password" type="password" autocomplete="off" placeholder="請輸入密碼">
            <input id='reg_repassword' name="password" type="password" autocomplete="off" placeholder="請再輸入一次密碼">
            <p class="validateTips">提示文字</p>

            <a class="nextTab"  data-panel-open="#info_panel" >註冊</a>
            <a href="index.php">返回首頁</a>
            <a onclick="$('.loginframe').dialog('open');">已有iWant帳號?登入></a>
        </div>
       <div class="sharePanel" id="info_panel"> 
            <div class="shareFade"> 
             <div>
             <img class="share_logo" src="https://upload.cc/i1/2022/05/26/eKBEus.png" onclick=""><br>
                <input id='reg_email' name="email" type="email" required placeholder="請輸入Email">
                <a>發送驗證碼</a><br>
                <input name="" type="text" placeholder="請填寫驗證碼(功能停用)"><br>
                <button style="width: 100px; height: 100px" id="upload">
                    <input id="reg_img" type="file" name="img" onchange="readURL(this)" targetID="preview_img">
                    <img src="./uploads/default-image.jpg" alt="" id="preview_img">
                </button></br>
                <input id='reg_name' name="name" type="text" required placeholder="請輸入暱稱"><br>
                <input id='reg_dep' name="department" type="text" placeholder="請輸入系級"><br>
                <input id='reg_stu_ID' name="stu_ID" type="text" required placeholder="請輸入學號"><br>
                <input id='reg_others' name="others" type="text" placeholder="請輸入手機號碼(選填)"><br>
                <a class="checkTab" data-panel-open="#info_panel" >確認註冊</a>
                <a class="shareClose" data-close-panel="#info_panel">返回</a>
                <a onclick="$('.loginframe').dialog('open');">已有iWant帳號?登入></a>
                <p class="validateTips_share">提示文字</p>
            </div>
            </div> 
       </div> 
    </form>   
    
   
       
</body>
</html>