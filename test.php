<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/jquery-ui.css">
    <link rel="stylesheet" href="./css/jquery.datetimepicker.css">
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="./js/test.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js" integrity="sha512-AIOTidJAcHBH2G/oZv9viEGXRqDNmfdPVPYOYKGy3fti0xIplnlgMHUGfuNRzC6FkzIo0iIxgFnr9RikFxK+sw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    
    <div class='loginframe' style="display: none;">
        <form id="form" action="./php/login.php" method="post">
        <p class="validateTips">提示</p>
        <div>
            帳號: <input id='account' name="account" type="text" placeholder="請輸入帳號"><br>
            密碼: <input id='password' name="password" type="password" placeholder="請輸入密碼"><br>
            <a href="register.php">還沒有帳號嗎?</a>
        </div>

        <?php if(isset($_GET['error'])){ ?>
            <p class="error" style="background-color: red;"><?php echo $_GET['error'] ?></p>
        <?php } ?>
        </form>
    </div>
    <div id="header-bar">
            <a href="./index.php", style="width: 100px; height:45px;"><img class="logo", src="https://upload.cc/i1/2022/05/02/dpfash.png", onclick=""></a>
            <div class="search">
                 <input class="search-bar" type="text" name="search" id="search" placeholder="search">
                 <button class="search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
            <div class="btn">
                <div class="notice"><a onclick="goSysNotify()">通知</a></div>
                <div class="message"><a onclick="goMsg()">訊息</a></div>
                <div class="personal"><a onclick="goPersonalPage()">個人頁面</a></div>
                <div class="login"><a id="login" onclick="$('.loginframe').dialog('open');">登入/註冊</a></div>
            </div>
    </div>
</body>
</html>