<?php
// Check for a cookie, if none go to login page
if (!isset($_COOKIE['user_incession']))
{
    //header('Location: /mysql-test/index.php');
    
}
else{
    // Try to find a match in the database
$guid = $_COOKIE['user_incession'];
require_once 'connect.php';
$query = "SELECT user_account FROM user_info WHERE user_incession = '$guid'";
$result = mysqli_query($conn,$query);

if (!mysqli_num_rows($result))
{
    // No match for guid
    //header('Location: /mysql-test/index.php');
    
}
else{
    header('Location: ./home.php');
}
}

?>