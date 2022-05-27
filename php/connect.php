<?php
$servername = "localhost";
$db_username = "root";
$db_password = "dfg48816";
$dbname = "db-test";
// 创建连接
$conn = new mysqli($servername, $db_username, $db_password,$dbname);
 
// 检测连接
if ($conn->connect_error) {
    die("連接失敗: " . $conn->connect_error);
} 
?>