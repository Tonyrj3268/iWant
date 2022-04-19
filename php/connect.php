<?php
$servername = "localhost";
$username = "109306066";
$password = "109306066";
$dbname = "db-test";
// 创建连接
$conn = new mysqli($servername, $username, $password,$dbname);
 
// 检测连接
if ($conn->connect_error) {
    die("連接失敗: " . $conn->connect_error);
} 
?>