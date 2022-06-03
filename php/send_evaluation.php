<?php
require_once 'connect.php';
$record_id = $_POST['record_id'];
$user_id = $_COOKIE['name'];
$score = $_POST['score'];
$content = $_POST['content'];

$query = "UPDATE stuff_record SET rating = '$score', evaluation = '$content' WHERE record_id = '$record_id' and borrower_id='$user_id'";

$result = mysqli_query($conn,$query);

if($result)
{
    echo 'success';
}
else{
    echo 'fail';
    //echo "fail";
}

?>