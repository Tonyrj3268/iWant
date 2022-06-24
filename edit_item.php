<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>編輯頁面</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js" integrity="sha512-AIOTidJAcHBH2G/oZv9viEGXRqDNmfdPVPYOYKGy3fti0xIplnlgMHUGfuNRzC6FkzIo0iIxgFnr9RikFxK+sw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://kit.fontawesome.com/0999d15b7c.js" crossorigin="anonymous"></script>
    <script src="./js/edit_item.js"></script>
    
    
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
        $user=$_POST['user'];
        $img=$_POST['img'];
        $category=$_POST['category'];
        $choose='';
            if($category==1){
                $choose='<option value="0">請選擇物品分類</option>
                <option value="1" selected="selected">原文書</option>
                <option value="2">計算機</option>
                <option value="3">文具</option>
                <option value="4">衣服</option>
                <option value="5">居家用品</option>
                <option value="6">其他</option>';
            }
            else if($category==2){
                $choose='<option value="0">請選擇物品分類</option>
                <option value="1" >原文書</option>
                <option value="2"selected="selected">計算機</option>
                <option value="3">文具</option>
                <option value="4">衣服</option>
                <option value="5">居家用品</option>
                <option value="6">其他</option>';
            }
            else if($category==3){
                $choose='<option value="0">請選擇物品分類</option>
                <option value="1" >原文書</option>
                <option value="2">計算機</option>
                <option value="3"selected="selected">文具</option>
                <option value="4">衣服</option>
                <option value="5">居家用品</option>
                <option value="6">其他</option>';
            }
            else if($category==4){
                $choose='<option value="0">請選擇物品分類</option>
                <option value="1" >原文書</option>
                <option value="2">計算機</option>
                <option value="3">文具</option>
                <option value="4"selected="selected">衣服</option>
                <option value="5">居家用品</option>
                <option value="6">其他</option>';
            }
            else if($category==5){
                $choose='<option value="0">請選擇物品分類</option>
                <option value="1" >原文書</option>
                <option value="2">計算機</option>
                <option value="3">文具</option>
                <option value="4">衣服</option>
                <option value="5"selected="selected">居家用品</option>
                <option value="6">其他</option>';
            }
            else if($category==6){
                $choose='<option value="0">請選擇物品分類</option>
                <option value="1" >原文書</option>
                <option value="2">計算機</option>
                <option value="3">文具</option>
                <option value="4">衣服</option>
                <option value="5">居家用品</option>
                <option value="6"selected="selected">其他</option>';
            }else if($category==0){
                $choose='<option value="0"selected="selected">請選擇物品分類</option>
                <option value="1" >原文書</option>
                <option value="2">計算機</option>
                <option value="3">文具</option>
                <option value="4">衣服</option>
                <option value="5">居家用品</option>
                <option value="6">其他</option>';
            }
        if($status == "borrow"){
            
            echo '<form action="" method="post" id="post-content" enctype="multipart/form-data">
            <input type="hidden" name="id" id="id" value="'.$id.'">
            <div class="post_div" style="display:flex;flex-direction: row;margin-right:5%;gap:10px;">
            <div style="display:flex;flex-direction: column;margin-right:5%;gap:10px;justify-content: center;align-items: center;">
            <button style="width: 300px; height: 348px" id="upload">
                <input id="img"type="file" name="img" onchange="readURL(this)" targetID="preview_img" style="width: 300px; height: 348px">
                <img src="./uploads/'.$img.'" alt="" id="preview_img"> 
            </button> 
            <p class="validateTips">提示:是否要發文?</p>
            </div>
            
            <div style="display:flex;flex-direction: column;gap:10px;">
                <a>物品名稱:</a>
                <div style="display:flex;flex-direction: row;gap:10px;">
                    <input type="text" name="topic" id="topic" placeholder=" 請輸入物品名稱..." style="border: 1px solid #909090;border-radius: 8px; width:60%" value="'.$topic.'">
                    <div>
                        <label>租給別人: <input name="rent_borrow" type="radio" value="rent" > </label> 
                        <label>我需要借: <input name="rent_borrow" type="radio" value="borrow" checked="checked"></label> 
                    </div>
                </div>
                <a>物品描述:</a>
                <textarea id="content" name="content" cols="30" rows="10" placeholder=" 請以五十字以內描述商品外觀、狀況..." style="border: 1px solid #909090;border-radius: 8px;width:550px;">'.$content.'</textarea>

                <div style="display:flex;flex-direction: row;gap:10px;">
                    <div style="display:flex;flex-direction: column;">
                        <a>設定金額:</a>
                        <input type="text" name="price" id="price" value="'.$price.'" placeholder=" $新台幣/一小時" style="border: 1px solid #909090;border-radius: 8px;">
                    </div>
                    <div style="display:flex;flex-direction: column;">
                        <a>選擇物品分類:</a>
                        <select id="stuff_select">
                            '.$choose.'
                        </select>
                    </div>
                
                </div>
                
                
                </div>
            </div>
            <div style="display:flex;flex-direction: row;">
                <a href="index.php" 
                style="position: absolute;
                        display: flex;
                        flex-direction: row;
                        justify-content: center;
                        align-items: center;
                        padding: 9px 15px;
                        gap: 10px;
                        width: 10%;
                        height: 8%;
                        left: 60%;
                        top: 70%;
                        font-size:24px;
                        color:#498EAF !important;
                        cursor: pointer;">取消</a>
                <a onclick="editItem()" 
                style="position: absolute;
                        display: flex;
                        flex-direction: row;
                        justify-content: center;
                        align-items: center;
                        padding: 9px 15px;
                        gap: 10px;
                        width: 10%;
                        height: 8%;
                        left: 70%;
                        top: 70%;
                        font-size:40px;
                        color:#ffffff !important;
                        background: #498EAF;
                        border-radius: 10px;
                        cursor: pointer;">修改!</a>
            </div>
            
            
            
        </form>';
            /*echo '<form action="" method="post" id=\'post-content\' enctype="multipart/form-data">
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
        <a onclick="editItem()" style="cursor: pointer;">修改</a>
        <a href=\'index.php\' style="cursor: pointer;">取消</a>
    </form>
    <p class="validateTips">提示:是否要更改?</p>';*/
        }
        else{
            echo '<form action="" method="post" id="post-content" enctype="multipart/form-data">
            <input type="hidden" name="id" id="id" value="'.$id.'">
            <div class="post_div" style="display:flex;flex-direction: row;margin-right:5%;gap:10px;">
            <div style="display:flex;flex-direction: column;margin-right:5%;gap:10px;justify-content: center;align-items: center;">
            <button style="width: 300px; height: 348px" id="upload">
                <input id="img"type="file" name="img" onchange="readURL(this)" targetID="preview_img" style="width: 300px; height: 348px">
                <img src="./uploads/'.$img.'" alt="" id="preview_img"> 
            </button> 
            <p class="validateTips">提示:是否要發文?</p>
            </div>
            
            <div style="display:flex;flex-direction: column;gap:10px;">
                <a>物品名稱:</a>
                <div style="display:flex;flex-direction: row;gap:10px;">
                    <input type="text" name="topic" id="topic" placeholder=" 請輸入物品名稱..." style="border: 1px solid #909090;border-radius: 8px; width:60%" value="'.$topic.'">
                    <div>
                        <label>租給別人: <input name="rent_borrow" type="radio" value="rent" checked="checked"> </label> 
                        <label>我需要借: <input name="rent_borrow" type="radio" value="borrow" /></label> 
                    </div>
                </div>
                <a>物品描述:</a>
                <textarea id="content" name="content" cols="30" rows="10" placeholder=" 請以五十字以內描述商品外觀、狀況..." style="border: 1px solid #909090;border-radius: 8px;width:550px;">'.$content.'</textarea>

                <div style="display:flex;flex-direction: row;gap:10px;">
                    <div style="display:flex;flex-direction: column;">
                        <a>設定金額:</a>
                        <input type="text" name="price" id="price" value="'.$price.'" placeholder=" $新台幣/一小時" style="border: 1px solid #909090;border-radius: 8px;">
                    </div>
                    <div style="display:flex;flex-direction: column;">
                        <a>選擇物品分類:</a>
                        <select id="stuff_select">
                        '.$choose.'
                        </select>
                    </div>
                
                </div>
                
                
                </div>
            </div>
            <div style="display:flex;flex-direction: row;">
                <a href="index.php" 
                style="position: absolute;
                        display: flex;
                        flex-direction: row;
                        justify-content: center;
                        align-items: center;
                        padding: 9px 15px;
                        gap: 10px;
                        width: 10%;
                        height: 8%;
                        left: 60%;
                        top: 70%;
                        font-size:24px;
                        color:#498EAF !important;
                        cursor: pointer;">取消</a>
                <a onclick="editItem()" 
                style="position: absolute;
                        display: flex;
                        flex-direction: row;
                        justify-content: center;
                        align-items: center;
                        padding: 9px 15px;
                        gap: 10px;
                        width: 10%;
                        height: 8%;
                        left: 70%;
                        top: 70%;
                        font-size:40px;
                        color:#ffffff !important;
                        background: #498EAF;
                        border-radius: 10px;
                        cursor: pointer;">修改!</a>
            </div>
            
            
            
        </form>';
            /*echo '<form action="" method="post" id=\'post-content\' enctype="multipart/form-data">
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
        <a onclick="editItem()" style="cursor: pointer;">修改</a>
        <a href=\'index.php\' style="cursor: pointer;">取消</a>
    </form>
    <p class="validateTips">提示:是否要更改?</p>';*/
        }

        
    ?>
        
</body>
</html>