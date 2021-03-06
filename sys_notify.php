<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>通知</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/jquery-ui.css">
 <script src="https://kit.fontawesome.com/0999d15b7c.js" crossorigin="anonymous"></script>


    <!-- <script src="./js/jquery-3.6.0.js"></script>
    <script src="./js/app.js"></script>
    <script src="./js/jquery-ui.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="./js/notify.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <style>
.form-group{
    height: 50px;
    display: flex;
    flex-direction: row;
    background-color: #498EAF;
    border-radius: 0px 0px 20px 20px;
}
.notify:hover{
    color: blue;
    text-decoration: underline;
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

#sys_notify{
    height:90%;
    width: 30%;
}
#sys_notify_details{
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
.notify_dialog{
    position: absolute;
    left:633px;
    top: 205px;
    width: 745px;
    height: 500px;
    border-radius: 30px;

}

</style>  
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

    <div class="container">
    <br/>
        <div class="table-responsive">
        <div id="sys_notify"></div>
        <div id="sys_notify_details"></div>
    </div>
    </div>
    
</body>
</html>