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
    <script src="./js/jquery-3.6.0.js"></script>
    <script src="./js/chat.js"></script>
    <script src="./js/jquery-ui.js"></script>
</head>
<body>
<body>
    <div class='logoutframe' style="display: none;">
        <p class="validateTips">提示:是否要登出?</p>
        <div>
            <a href="index.php" onclick="delCookie('name'),delCookie('user_incession')">確認</a>
            <a onclick="$('.logoutframe').dialog('close')" style="cursor: pointer;">取消</a>
        </div>
    </div>
    <?php include 'php/header_bar.php';?>

    <style>

.chat_message_area
{
 position: relative;
 width: 100%;
 height: auto;
 background-color: #FFF;
    border: 1px solid #CCC;
    border-radius: 3px;
}

#group_chat_message
{
 width: 100%;
 height: auto;
 min-height: 80px;
 overflow: auto;
 padding:6px 24px 6px 12px;
}

.image_upload
{
 position: absolute;
 top:3px;
 right:3px;
}
.image_upload > form > input
{
    display: none;
}

.image_upload img
{
    width: 24px;
    cursor: pointer;
}
.container{
    height: 90%;
}
.table-responsive{
    display: flex;
    
}

#user_details{
    height:90%;
    width: 30%;
}
#user_model_details{
    background-color: #FFF;
    width: 70%;
    height:90%;
    margin-right: 5%;
}
.ui-dialog-title{
    font-size: 24px;
}

</style>  
<div class="container">
   <br/>
    <div class="table-responsive">
    <div id="user_details"></div>
    <div id="user_model_details"></div>
   </div>
</div>
</body>
</html>