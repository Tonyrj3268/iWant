<?php include('./php/incession.php');?>
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
    <!--<script src="./js/jquery-3.6.0.js"></script>
    <script src="./js/app.js"></script>
    <script src="./js/jquery-ui.js"></script>-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="./js/app.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
</head>

<body>
    <?php include('php/incession.php');?>
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

    <div class='itemframe' style="display: none;">
        <form id="upfile" action="./php/pic_store.php" method="post" enctype="multipart/form-data">
        <div>
            <p class="item-content"></p>
            <!--<input type="file" id='pic' name="pic" ><br>
            <a onclick="uploadpic()" style="cursor: pointer;">插入圖片</a>-->
            
        </div>
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
    <div id='serach_filter'>
        <input type="text" name="" id="" placeholder="輸入一或多於一個字元來搜尋...">
        <button>search</button><br>
        <select name="" id="">
            <option value="">請選擇想要的類型</option>
        </select>
    </div>
    <div>
        <div>
        <label  onchange="setItemContainer()"><input type="radio" id="item-category" name="item-category" value="rent" checked="checked">我要租</label>
            <label  onchange="setItemContainer()"><input type="radio" id="item-category" name="item-category" value="borrow">我要借</label>
        </div>
        <div id='item-container'></div>
    </div>
    
    <div id='item-append'>
        <input type="image" src="https://img.icons8.com/flat-round/64/000000/plus.png" onclick="goAppendItem()">
    </div>
    
    
</body>
</html>