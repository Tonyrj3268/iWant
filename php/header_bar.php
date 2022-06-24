<?php 
echo '<div id="header-bar">
    <div><a href="./index.php"><img class="logo", src="https://upload.cc/i1/2022/05/26/eKBEus.png", onclick=""></a></div>
    <div class="search">
        <input class="search-bar" type="text" name="search" id="search" placeholder="功能停用">
        <button class="search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
    </div>
    <div class="btn">
    <a class="notice" onclick="goSysNotify()"><i class="fa-solid fa-bell"></i></a><div class="sys_notice"><a></a></div>
    <a class="message" onclick="goMsg()"><i class="fa-solid fa-message"></i></a><div class="msg_notice"><a></a></div>
    <a class="personal" onclick="goPersonalPage()"><i class="fa-solid fa-user"></i></a>
    <a class="logout" id="logout" onclick="$(\'.logoutframe\').dialog(\'open\');"><i class="fa-solid fa-arrow-right-from-bracket">LogOut</i>
    </a> 
    </div>
    </div>
    <div class="cover"></div>'
?>