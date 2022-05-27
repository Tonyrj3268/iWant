<?php include('php/incession.php');?>
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
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="./js/app.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js" integrity="sha512-AIOTidJAcHBH2G/oZv9viEGXRqDNmfdPVPYOYKGy3fti0xIplnlgMHUGfuNRzC6FkzIo0iIxgFnr9RikFxK+sw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://kit.fontawesome.com/0999d15b7c.js" crossorigin="anonymous"></script>
    
</head>

<body>
    <?php include('php/incession.php');?>
    <div class='loginframe' style="display: none;">
        <form id="form" action="./php/login.php" method="post">
        <p class="validateTips">提示</p>
        <div>
            帳號: <input id='account' name="account" type="text" placeholder="請輸入帳號"><br>
            密碼: <input id='password' name="password" type="password" placeholder="請輸入密碼"><br>
            <a href="register.php">註冊帳號</a>
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
            
        </div>
        </form>
    </div>
    <div id="header-bar">
            <a href="./index.php", style="width: 100px; height:45px;"><img class="logo", src="https://upload.cc/i1/2022/05/26/eKBEus.png", onclick=""></a>
            <div class="search">
                 <input class="search-bar2" type="text" name="search" id="search" placeholder="search">
                 <button class="search-btn2"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
            <div class="btn">
                <div class="notice"><a onclick="goSysNotify()"><i class="fa-solid fa-bell"></i></a></div>
                <div class="message"><a onclick="goMsg()"><i class="fa-solid fa-message"></i></a></div>
                <div class="personal"><a onclick="goPersonalPage()"><i class="fa-solid fa-user"></i></a></div>
                <div class="login"><a id="login" onclick="$('.loginframe').dialog('open');"><i class="fa-solid fa-right-to-bracket",style="padding-right=5%"></i>Login</a></div>
            </div>
    </div>
    <div class="cover"></div>
    <div id='serach_filter'>
        
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