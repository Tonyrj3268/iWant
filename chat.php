<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>聊天</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="./js/chat.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js" integrity="sha512-AIOTidJAcHBH2G/oZv9viEGXRqDNmfdPVPYOYKGy3fti0xIplnlgMHUGfuNRzC6FkzIo0iIxgFnr9RikFxK+sw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://kit.fontawesome.com/0999d15b7c.js" crossorigin="anonymous"></script>
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
.chat-btn{
    background-color: #498EAF;
    color: #FFF;
    border-radius: 8px;
    border: 1px solid rgba(255, 255, 255, 0.97);
    height: 30px;
    margin: 10px 10px 5px 10px;
    width: 50px;
}
.form-control{
    height: 30px;
    width:800px;
    border-radius: 8px;
    margin: 10px 10px 5px 10px;
    
}
.form-group{
    height: 50px;
    display: flex;
    flex-direction: row;
    background-color: #498EAF;
    border-radius: 0px 0px 20px 20px;
}
.user_dialog{
    background-color: white;
}
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

.ui-dialog-titlebar{
    background-color: #498EAF;
    border-radius: 30px 30px 0px 0px;
    height: 50px;
}

.user_dialog{
    position: absolute;
    left:633px;
    top: 205px;
    width: 745px;
    height: 500px;
    border-radius: 30px;
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