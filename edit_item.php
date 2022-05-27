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
    <script src="./js/edit_item.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
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
    <?php include 'php/header_bar.php';?>
    <?php

        $id=$_POST['id'];
        $status=$_POST['status'];
        $topic=$_POST['topic'];
        $content=$_POST['content'];
        $price=$_POST['price'];
        $place=$_POST['place'];
        $user=$_POST['user'];
        $img=$_POST['img'];

        if($status == "borrow"){
            echo '<form action="" method="post" id=\'post-content\' enctype="multipart/form-data">
        <div>
            <label><input name="rent_borrow" type="radio" value="rent" />租 </label> 
            <label><input checked=true name="rent_borrow" type="radio" value="borrow" />借 </label> 
        </div>
        <input type="hidden" name="id" id="id" value="'.$id.'">
        <input type="text" name="topic" id="topic" value="'.$topic.'">
        <textarea id="content" name="content" cols="30" rows="10" >'.$content.'</textarea>
        <p>商品實際圖片(選填)</p>
        <button style="width: 100px; height: 100px" id=\'upload\'>
            <input id=\'img\'type="file" name="img" onchange="readURL(this)" targetID="preview_img">
            <img src="uploads/'.$img.'" alt="" id="preview_img">
        </button> 
        <input type="text" name="price" id="price" value="'.$price.'">
        <input type="text" name="place" id="place" value="'.$place.'">
        <a onclick="editItem()" style="cursor: pointer;">修改</a>
        <a href=\'index.php\' style="cursor: pointer;">取消</a>
    </form>
    <p class="validateTips">提示:是否要更改?</p>';
        }
        else{
            echo '<form action="" method="post" id=\'post-content\' enctype="multipart/form-data">
        <div>
            <label><input checked=true name="rent_borrow" type="radio" value="rent" />租 </label> 
            <label><input name="rent_borrow" type="radio" value="borrow" />借 </label> 
        </div>
        <input type="hidden" name="id" id="id" value="'.$id.'">
        <input type="text" name="topic" id="topic" value="'.$topic.'">
        <textarea id="content" name="content" cols="30" rows="10" >'.$content.'</textarea>
        <p>商品實際圖片(選填)</p>
        <button style="width: 100px; height: 100px" id=\'upload\'>
            <input id=\'img\'type="file" name="img" onchange="readURL(this)" targetID="preview_img">
            <img src="uploads/'.$img.'" alt="" id="preview_img">
        </button> 
        <input type="text" name="price" id="price" value="'.$price.'">
        <input type="text" name="place" id="place" value="'.$place.'">
        <a onclick="editItem()" style="cursor: pointer;">修改</a>
        <a href=\'index.php\' style="cursor: pointer;">取消</a>
    </form>
    <p class="validateTips">提示:是否要更改?</p>';
        }

        
    ?>
        
</body>
</html>