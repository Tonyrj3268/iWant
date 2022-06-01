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
    <link rel="stylesheet" href="./css/jquery.datetimepicker.css">
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="./js/app.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js" integrity="sha512-AIOTidJAcHBH2G/oZv9viEGXRqDNmfdPVPYOYKGy3fti0xIplnlgMHUGfuNRzC6FkzIo0iIxgFnr9RikFxK+sw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://kit.fontawesome.com/0999d15b7c.js" crossorigin="anonymous"></script>
</head>

<body>

    <div class='logoutframe' style="display: none;">
        <!-- <form id="form" action="./php/login.php" method="post"> -->
        <p class="validateTips">提示:是否要登出?</p>
        <div>
            <a href="index.php" onclick="delCookie('name'),delCookie('user_incession')">確認</a>
            <a onclick="$('.logoutframe').dialog('close')" style="cursor: pointer;">取消</a>
        </div>
        <!-- </form> -->
    </div>
    <div class='itemframe' style="display: none;">
        <form id="form" action="./edit_item.php" method="post">
        <div>
            <p class="item-content"></p>  
           
        </div>
        </form>
    </div>
    <div class='askframe' style="display: none;" title="是否要租借此商品?"> 
        <div>
           <a href="">點擊確認將為您自動傳送通知給賣家並跳至訊息頁面!</a>
        </div>
        </form>
    </div>
    <?php include 'php/header_bar.php';?>
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