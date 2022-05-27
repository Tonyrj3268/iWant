<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="./js/register.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
    <div id="header-bar">
        <a href="index.php">首頁</a>
        <a onclick="goSysNotify()">通知</a>
        <a onclick="goMsg()">訊息</a>
        <a onclick="goPersonalPage()">個人頁面</a>
        <a id="login" onclick="$('.loginframe').dialog('open');">登入/註冊</a>
    </div>
    <div class="cover"></div>
    
    <form id="form-register" action="##" method="post">
        <div class="share_Panel" id="account_panel">
            請輸入帳號:<input id='reg_account' name="account" type="text"><br>
            請輸入密碼:<input id='reg_password' name="password" type="password" autocomplete="off"><br>
            請再輸入一次密碼:<input id='reg_repassword' name="password" type="password" autocomplete="off"><br>
            <button class="nextTab"  data-panel-open="#verify_panel" type="button">下一頁</button>
            <a href="index.php">返回首頁</a>
        </div>
        <div class="sharePanel" id="verify_panel"> 
            <div class="shareFade"> 
             <div>
                請輸入電子信箱:<input id='reg_email' name="email" type="text">
                <button>點擊寄送驗證碼</button><br>
                請輸入驗證碼:<input name="" type="text"><br>
                <button class="nextTab" data-panel-open="#info_panel" type="button">下一頁</button>
                <a class="shareClose" data-close-panel="#verify_panel">返回上頁</a>
            </div>
            </div> 
       </div> 
       <div class="sharePanel" id="info_panel"> 
            <div class="shareFade"> 
             <div>
                請輸入稱呼:<input id='reg_name' name="name" type="text"><br>
                請輸入系級:<input id='reg_dep' name="department" type="text"><br>
                請輸入學號:<input id='reg_stu_ID' name="stu_ID" type="text"><br>
                是否有額外聯絡方式:<input id='reg_others' name="" type="text"><br>
                <button class="nextTab" data-panel-open="#info_panel" type="button">註冊</button>
                <a class="shareClose" data-close-panel="#info_panel">返回上頁</a>
            </div>
            </div> 
       </div> 
    </form>   
    <p class="validateTips">提示</p>

   
       
</body>
</html>