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
    <script src="./js/jquery-3.6.0.js"></script>
    <script src="./js/new-post.js"></script>
    <script src="./js/jquery-ui.js"></script>
    <script src="./js/jquery.datetimepicker.full.js"></script>
</head>
<body>

    <div class='logoutframe' style="display: none;">
        <p class="validateTips">提示:是否要登出?</p>
        <div>
            <a href="index.php" onclick="delCookie('name'),delCookie('user_incession')">確認</a>
            <a onclick="$('.logoutframe').dialog('close')" style="cursor: pointer;">取消</a>
        </div>
    </div>
    <?php include 'php/header_bar.php';?>
        <form action="" method="post" id='post-content' enctype="multipart/form-data">
            <div>
                <label><input name="rent_borrow" type="radio" value="rent" />租 </label> 
                <label><input name="rent_borrow" type="radio" value="borrow" />借 </label> 
            </div>
            <input type="text" name="topic" id="topic" placeholder="標題">
            <textarea id="content" name="content" cols="30" rows="10" placeholder="商品敘述......"></textarea>
            <p>商品實際圖片(選填)</p>
            <button style="width: 100px; height: 100px" id='upload'>
                <input id='img'type="file" name="img" onchange="readURL(this)" targetID="preview_img">
                <img src="./uploads/default-image.jpg" alt="" id="preview_img">
            </button> 
            <input type="text" name="price" id="price" placeholder="價格/1小時">
            <input type="text" name="place" id="place" placeholder="面交地點">
            <p>結束日期:<input type="text" class="accept_date" id="accept_date" placeholder="請選擇日期"></p><br>
            <p>可接受之時間:<input type="text" id="accept_time" placeholder="請選擇時間"></p><br>
            <a onclick="appendItem()" style="cursor: pointer;">發文</a>
            <a href='index.php' style="cursor: pointer;">取消</a>
        </form>
        <p class="validateTips">提示:是否要發文?</p>
</body>
</html>