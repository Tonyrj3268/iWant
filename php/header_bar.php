<?php 
echo '<div id="header-bar">
    <a href="index.php">首頁</a>
    <a onclick="goSysNotify()">通知</a>
    <a onclick="goMsg()">訊息</a>
    <a onclick="goPersonalPage()">個人頁面</a>
    <a id="logout"
    onclick="$(\'.logoutframe\').dialog(\'open\');">登出
    </a>
    </div>
    <div class="cover"></div>'
?>